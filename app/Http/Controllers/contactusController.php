<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\feedbackModel;
use App\Mail\NotifyFeedbackMailer;
use App\Mail\FeedBackSentMailer;
use Illuminate\Support\Facades\Session;

use Auth;

class contactusController extends Controller
{
    //
	private $allowedOptions = [
		"Recruit  招聘",
		"Job     求职",
		"Visa    签证",
		"Training  培训",
		"Incubator 创业",
		"Others  其他"
	];
    public function index()
    {
    	return view("contactuspage.index");
    }
    public function storeFeedback(Request $request)
    {

    	$request->validate([
    		"firstname" => ["required",  'max:200'],
    		"lastname" => ["required", 'max:200'],
    		"email" => ["required",'email', 'min:8', 'max:200'],
    		"messageConcern" => "required|in:1,2,3,4,,5,6",
    		"message" => ["required", 'min:10', 'max:200'],

    	]);

    	$feedbackModel = new feedbackModel;
    	$feedbackModel->firstname = $request->firstname;
    	$feedbackModel->lastname = $request->lastname;
    	$feedbackModel->email = $request->email;
    	$feedbackModel->concernTopic = $request->messageConcern;
    	$feedbackModel->feedbackMessage = $request->message;
    	$feedbackModel->isRepliedTo = 'false';
    	$request->messageConcern = $this->allowedOptions[$request->messageConcern];
    	if($feedbackModel->save())
    		session()->flash('successFeedBack', 'Thank you for contacting us.'.
    			' We will reply to you as soon as possible');
    	\Mail::to(env('FEEDBACK_ADMIN_EMAIL'))->send(new NotifyFeedbackMailer($request));
    	\Mail::to($request->email)->send(new FeedBackSentMailer($request->firstname.' '.$request->lastname));
    	return redirect(env('APP_URL').'/#contactBlock');
    }
    public function clientFeedback()
    {
        $this->isAlreadyLoggedIn();
        $feedbacks = feedbackModel::all();
        return view('admin.feedback', compact('feedbacks'));
    }
    public function markAsReplied($feeedbackId)
    {
        $feedbacks = $feedbacks = feedbackModel::all();
        $this->isAlreadyLoggedIn();
        if($this->isNotExistingFeedback($feeedbackId))
        {
            $error = 'The feedback you are trying to mark as replied doesn\'t exist';
            return view('admin.feedback', compact('error','feedbacks'));
        }
        else
        {
            $feedback =feedbackModel::where('id' , $feeedbackId)->get();
            if($feedback[0]->isRepliedTo === 'false')
            {
                try
                {
                    feedbackModel::where('id' , $feeedbackId)->update(['isRepliedTo'=>'true']);
                    $success = '<b>The feedback is successfuly marked as replied<b>';
                    $feedbacks = $feedbacks = feedbackModel::all();//call again, to update the status
                    return view('admin.feedback', compact('success','feedbacks'));
                }
                catch(\Illuminate\Database\QueryException $e)
                {
                    $error = $e->getMessage();
                    return view('admin.feedback', compact('error', 'feedbacks'));
                }
            }
            else 
            {
                if($feedback[0]->isRepliedTo !== 'true')
                    $status = ' <b> unknown status labeled: '.$feedback[0]->isRepliedTo.'<b>';
                else
                    $status = 'Replied';
                $error = 'The status of the feedback is already marked as '.$status;
                return view('admin.feedback', compact('error','feedbacks'));
            }
                
        }

    }
    public function viewReply($feeedbackId)
    {
        $this->isAlreadyLoggedIn();
        if($this->isNotExistingFeedback($feeedbackId))
        {
            $error = 'The feedback you are trying to view / reply  doesn\'t exist';
            return view('admin.feedback', compact('error','feedbacks'));
        }
        else
        {
            $feedback = feedbackModel::where('id' , $feeedbackId)->get();
            return view('admin.feedbackViewReply', compact('feedback'));
        }
    }
    public function doReply(Request $replyForm)
    {
        $replyForm->validate([
            'feedbackReplyContent' => 'required|string|min:'
        ]);

        
    }
    public function isNotExistingFeedback($fid)
    {
        $feedback = feedbackModel::where('id' , $fid)->get();
        if($feedback === null || count($feedback) <= 0)
            return true;
        else
            return false;
    }
    protected function isAlreadyLoggedIn()
    {
        if($user = Auth::user())
        {
            //
            return true;
            //return Redirect::route('login');
        }
        else
        {
            return redirect()->route('login')->send();
        }    
    }
}
