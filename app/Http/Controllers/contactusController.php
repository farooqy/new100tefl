<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\feedbackModel;
use App\Mail\NotifyFeedbackMailer;
use App\Mail\FeedBackSentMailer;
use Illuminate\Support\Facades\Session;

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

    	$request->messageConcern = $this->allowedOptions[$request->messageConcern];
    	if($feedbackModel->save())
    		session()->flash('successFeedBack', 'Thank you for contacting us.'.
    			' We will reply to you as soon as possible');
    	\Mail::to(env('FEEDBACK_ADMIN_EMAIL'))->send(new NotifyFeedbackMailer($request));
    	\Mail::to($request->email)->send(new FeedBackSentMailer($request->firstname.' '.$request->lastname));
    	return redirect(env('APP_URL').'/#contactus');
    }
}
