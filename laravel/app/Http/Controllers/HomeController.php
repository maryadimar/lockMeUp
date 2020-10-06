<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bagian;
use App\User;
use App\Meet;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $auth = Auth::user()->role->id;

        if( $auth == 1){

            $meetings       = Meet::where('status', 1)->get()->count();
            $bagian = Bagian::get()->count();
            $batalmeetings  = Meet::where('status', 3)->get()->count();
            $totalusers     = User::where('role_id', 3)->count();

            return view('superadmin.home', compact('totalusers', 'meetings', 'bagian', 'batalmeetings'));

        }else if( $auth == 2){

            $meetings       = Meet::where('status', 1)->get()->count();
            $sedangmeetings = Meet::where('status', 2)->get()->count();
            $batalmeetings  = Meet::where('status', 3)->get()->count();
            $totalusers     = User::where('role_id', 3)->count();

            return view('admin.home', compact('totalusers', 'meetings', 'sedangmeetings', 'batalmeetings'));

        }else{

            if(Auth::user()->actived == 0)
            return abort(404, 'Anda Di Suspend Silahkan Hubungi Admin');
                      
            return view('member.home');
            
        }
    }
}
