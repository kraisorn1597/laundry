<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

//    public function create()
//    {
//        return view('admin.users.create');
//    }
//
//    public function store(AdminRequest $request)
//    {
//        dd($request);
//        return Admin::create([
//            'username' => $request['username'],
//            'password' => Hash::make($request['password']),
//            'email' => $request['email'],
//            'first_name' => $request['first_name'],
//            'last_name' => $request['last_name'],
//            'gender' => $request['gender'],
//            'id_card' => $request['id_card'],
//            'tel' => $request['tel'],
//            'birthday' => $request['birthday'],
//            'address' => $request['address'],
//            'salary' => $request['salary'],
//        ]);
//
//    }
}
