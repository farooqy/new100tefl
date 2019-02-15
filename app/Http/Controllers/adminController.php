<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\feedbackModel;
use App\models\member_rolesModel;
use App\models\yibaiMemberModel;
use Auth;
use Redirect;
class adminController extends Controller
{
    //
    public function index()
    {
        $this->isAlreadyLoggedIn();
    	return view("admin.index");
    }
    public function clientFeedback()
    {
        $this->isAlreadyLoggedIn();
    	$feedbacks = feedbackModel::all();
    	return view('admin.feedback', compact('feedbacks'));
    }
    public function registerPage()
    {
        return view('admin.register');
    }
    public function loginPage()
    {
        return view('admin.login');
    }

    public function getRoles()
    {
        $this->isAlreadyLoggedIn();
        return 'will give you the roles';
    }

    public function createRole()
    {
        $this->isAlreadyLoggedIn();
        return view('admin.create_role');
    }
    public function editRole($role_id)
    {
        $this->isAlreadyLoggedIn();
        return "will edit roles $role_id";
    }
    public function storeRole(Request $newRole)
    {
        $this->isAlreadyLoggedIn();
        $newRole->validate([
            'role_name' => 'required|max:20'
        ]);
        $Role = new member_rolesModel;
        $Role->role_name = $newRole->role_name;
        $Role->role_token = hash("MD5", time());
        $Role->save();
        return $this.index();
    }
    public function doLogin(Request $loginForm)
    {
        session()->forget('error');
        session()->forget('isLoggedIn');
        $rules = [
            'memberEmail' => 'required|email',
            'memberPassword' => 'required|string',
        ];
        $customMessage = [
            'required' => 'Please enter a valid :attribute  ',
            'email' => 'The email you entered is not valid',
            'string' => 'Please enter a valid member password'
        ];

        $this->validate($loginForm, $rules, $customMessage);
        $hashPass = hash('MD5', $loginForm->memberPassword);
        $user = yibaiMemberModel::where([['member_email' ,'=', $loginForm->memberEmail], 
            ['member_password', '=', $hashPass]])->get();
        if(count($user) <= 0)
        {
            session(['error'=> 'The username or passwords is not valid. '.$hashPass]);
            // return 'things are weird cuz';
            // return $user;
            return view('admin.login');
        }
        else if(count($user) >= 1)
        {
            // return 'got a user '.count($user);
            session(['isLoggedIn'=> true]);
            foreach ($user as $key => $value) {
                session(['key'.$key => $value]);
                
            }
            // session()->flash('isSuccessLogIn', true); 
            header('Location: '.env('APP_URL').'admins');
            exit(0);
        }
        else
            session(['error' => 'Login Failed']);    
        return view('admin.login');
    }
    public function doRegister(Request $registerForm)
    {
        $rules = [
            "userName" => "required|min:8",
            "userEmail" => "required|email",
            "userPassword" => "required|confirmed|min:8",
            'adminstratorPassword' => 'required|in:noor1234'
        ];
        $customMessage = [
            "confirmed" =>"The passwords do not match",
            'in' => 'The :attribute is not correct'
        ];
        $this->validate($registerForm, $rules, $customMessage);
        $memberModel = new yibaiMemberModel;
        $memberModel->member_name = $registerForm->userName;
        $memberModel->member_email = $registerForm->userEmail;
        $memberModel->member_password = hash('MD5', $registerForm->userPassword);
        if(($user = yibaiMemberModel::where('member_email', $registerForm->userEmail)) !== null)
            session()->flash('error', 'user with similar email already exist');
        else if($memberModel->save())
            session()->flash('success','User successfully added');
        else
            session()->flash('error','Failed to save the user in the database.');
        return view('admin.register');

    }

    public function cookiesPolicy()
    {
        return view('policies.cookiespolicy');
    }
    public function privacyPolicy()
    {
        return view('policies.privacypolicy');
    }

    public function termsOfUse()
    {
        return view('policies.termsofuse');
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
