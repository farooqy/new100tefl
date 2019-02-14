<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\newsModel;
use App\models\newsFilesModel;
class newsController extends Controller
{
    //
    public function index()
    {
    	return view('newspage.index');
    }
    public function addFile(Request $formRequest)
    {
        $rules = [
        'addFile' => "required|max:20000|mimes:jpg,jpeg,png,avi,web,mp4,doc,docx,pdf"
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'max' => 'The file size is over the limit.',
            'mimes' => 'The type of the file is not valid. Please upload an image or video'
        ];

        $this->validate($formRequest, $rules, $customMessages);
        // $formRequest->validate([
        //     'addFile' => "required|max:20000|mimes:jpg,jpeg,png,avi,web,mp4"
        // ]);

        $fextension = $formRequest->file('addFile')->getClientOriginalExtension();
        $filename = time().'_addFile_.'.$fextension;
        if(!$formRequest->file('addFile')->move(
        base_path() . '/public/uploads/news/tmps/', $filename))
            $json =json_encode(array("success" => false, 'fileurl' => null));

        $json = json_encode(array("success" => true, "fileurl" => env('APP_URL').'uploads/news/tmps/'.$filename));
        return $json;
    }
    public function showAllNews()
    {
        $newsList = newsModel::orderBy('id', 'desc')->get();

        return view('newspage.listNews', compact('newsList'));
    }
    public function getGivenNews($newsId)
    {
        $givenNews = newsModel::where([['id', '=',$newsId], ['status', '=' ,'active']])->get()->all();
        return view('newspage.listNews',compact('givenNews'));
    }
    public function newNews(Request $request)
    {
        $failed = false;
        $fileTypes = [
            "image" => ["jpg","jpeg","png"],
            "video" => ["avi","web","mp4"]
        ];
    	$request->validate([
    		"newsTitle" => ["required", 'min:10', 'max:200'],
    		"newsFeatureImage" => ['required','mimes:jpg,jpeg,png,avi,web,mp4', 'max:200000'],
    		'newsContent' =>  ['required', 'min:100'],
    		"newsFiles" => ['max:200000']
    	]);
        if($request->file('newsFiles'))
        {
            $numfiles = count($request->file('newsFiles'))-1;
            foreach(range(0, $numfiles) as $index) 
            {
                $request->validate([
                    'newsFiles.' . $index => '|mimes:jpg,jpeg,png,avi,web,mp4,doc,docx|max:200000'
                ]);
            }
        }
        else
            $numfiles = -1;
        $fextension = $request->file('newsFeatureImage')->getClientOriginalExtension();
    	$filename = time().'_newsFeature_.'.$fextension;
        $featureImageUrl = env('APP_URL').'uploads/news/'.$filename;
        $newsFileNames = [];
    	if(!$request->file('newsFeatureImage')->move(
        base_path() . '/public/uploads/news/', $filename))
        {
            session()->flash('uploadFailed','Failed to upload news feature image/video');
            $failed = true;
        }
        if(in_array($fextension, $fileTypes["image"]))
            $featureType = "image";
        else if(in_array($fextension, $fileTypes["video"]))
            $featureType = "video";
        else
            $featureType = "unknown";
        $newsId = newsModel::get()->last();
        if($newsId == null )
        	$newsId = 0; 
        else
        	$newsId = $newsId->id; 
        if($numfiles > 0)  
        {
            foreach (range(0, $numfiles) as $index) 
            {
                $fextension = $request->file('newsFiles')[$index]->getClientOriginalExtension();
                $filename = (time()+($index+1)).'_newsFile_.'.$fextension;
                if(!$request->file('newsFiles')[$index]->move(
                base_path() . '/public/uploads/news/', $filename))
                {

                    session()->flash('uploadFailed','Failed to upload other files #'.$index);
                    $failed = true;
                    break;
                }
                else
                {
                    if(in_array($fextension, $fileTypes["image"]))
                        $ftype = "image";
                    else if(in_array($fextension, $fileTypes["video"]))
                        $ftype = "video";
                    else
                        $ftype = "unknown";
                    $newsFileNames[$index] = [
                        "news_id" => ($newsId+1),
                        'file_url'=>env('APP_URL').'uploads/news/'.$filename,
                        "file_type" => $ftype,
                        'file_status' => 'active',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                        
                    ];
                }    
            }
        }

        $newsModel = new newsModel;
        $newsModel->title = $request->newsTitle;
        $newsModel->feature_image = $featureImageUrl;
        $newsModel->content = $request->newsContent;
        $newsModel->feature_image_type = $featureType;
        $newsModel->save();
        newsFilesModel::insert($newsFileNames);
        if($failed === false)
            session()->flash('success',true);


        return view('newspage.index');
    }

    public function newYearParty()
    {
    	return view('newspage.newyear');
    }
}
