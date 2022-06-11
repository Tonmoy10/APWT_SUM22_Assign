<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInfo;

class userController extends Controller
{
    //
    public function reg() //view registration page
    {
        return view('User.Registration');
    }
    public function regVal(Request $req) //submit registration value /w validation
    {
        $this->validate($req,
        [
            "Name"=>"Required|regex:/^[A-Za-z -]+$/i",
            "Email"=>"Required",
            "Password"=>"Required|min:8|regex:/^.*(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$ %^&*~><.,:;]).*$/i",
            "Confirm"=>"Required|same:Password"
        ],
        [
            "Password.regex"=>"Your password must contain an uppder case, a lower case, a number and a symbol!",
            "Password.min"=>"Your password must be of length 8 or more!",
            "Password.required"=>"You must enter a password!",
            "Name.required"=>"You must enter your name!",
            "Name.regex"=>"Your name must be alphabetic!",
            "Email.required"=>"You must enter your email address!"
        ]
        );
        $usr= new UserInfo();
        $usr->Name = $req->Name;
        $usr->Email = $req->Email;
        $usr->Password = $req->Password;
        $usr->save();
        return view('User.Homepage');
    }

    public function log() //view login page
    {
        return view('User.Login');
    }

    public function logVal(Request $req) //submit login info
    {
        $this->validate($req,
        [
            "emailLog"=>"Required",
            "passLog"=>"Required",
        ],
        [
            "passLog.required"=>"You must enter a password!",
            "emailLog.required"=>"You must enter your email address!"
        ]
        );
        $val=userinfo::where([['Email',$req->emailLog],['Password',$req->passLog]])->get();
        if($val->isEmpty())
        {
            return "Invalid Information!";
        }
        else if($val[0]->Type=='User')
        {
            return redirect()->route('Dashboard'); 
        }
        else if($val[0]->Type=='Admin')
        {
            return redirect()->route('AdminDashboard'); 
        }
    }

    public function adminDash() //Dashboard for admin(shows users and admins)
    {
        $item=userinfo::all();
        return view('User.Dashboard')->with("Items",$item);
    }

    public function dash() //view dashboard by passing data about users(shows users only)
    {
        $item=userinfo::where('Type','User')->get();
        return view('User.Dashboard')->with("Items",$item);
    }

    public function info($Id) //view info by passing data about users
    {
        $data=userinfo::where('ID','=',$Id)->get();
        return view("User.Info")->with("data",$data);
    }

    public function details() //view info by passing data of all users
    {
        $det=userinfo::all();
        return  view("User.Info")->with("data",$det);
    }

    public function home() //view homepage
    {
        return view("User.Homepage");
    }

    public function preReg() //view Pre Reg 
    {
        return view("User.PreReg");
    }

    public function preRegVal(Request $req) //Passing pre reg value
    {
        if($req->user=='Admin')
        {
            return view("User.AdminReg");
        }
        else if($req->user=='User')
        {
            return view("User.Registration");
        }
    }

    public function admin() //view admin reg page
    {
        return view('User.AdminReg');
    }

    public function adminVal(Request $req) //submit admin registration value /w validation
    {
        $this->validate($req,
        [
            "Name"=>"Required|regex:/^[A-Za-z -]+$/i",
            "Email"=>"Required",
            "Password"=>"Required|min:8|regex:/^.*(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$ %^&*~><.,:;]).*$/i",
            "Confirm"=>"Required|same:Password"
        ],
        [
            "Password.regex"=>"Your password must contain an uppder case, a lower case, a number and a symbol!",
            "Password.min"=>"Your password must be of length 8 or more!",
            "Password.required"=>"You must enter a password!",
            "Name.required"=>"You must enter your name!",
            "Name.regex"=>"Your name must be alphabetic!",
            "Email.required"=>"You must enter your email address!"
        ]
        );
        $usr= new UserInfo();
        $usr->Name = $req->Name;
        $usr->Email = $req->Email;
        $usr->Password = $req->Password;
        $usr->Type='Admin';
        $usr->save();
        return view('User.Homepage');
    }
}
