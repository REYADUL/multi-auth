<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    {   if(Auth::user()->is_approved==0){
            return view('unapproved');
        }
        else{
            return view('home');
        }
        
    }
    public function allData(){
        $data['persons']=DB::table('users')->get();
        return $data;
    }
    public function adminHome( Request $request){
        
        $allData = $this->allData();
        return view('admin-home', $allData);
    }

    public function update( Request $request,$id){
        $data['is_approved']=1;
        DB::table('users')->where('id', $id)->update($data);
        return redirect()->back()->with('message', 'one user accepted');
    }

    public function delete( $id){
        DB::table('users')->where('id', $id)->delete();
        return redirect()->back()->with('message', 'one user declined');
        

    }
    

    public function waitingPage(){
        return view('unapproved');
    }
}
