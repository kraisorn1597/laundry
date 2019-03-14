<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EditorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin/editor');
    }

//    public function create()
//    {
//        return view('admin/create');
//    }
//    protected function validator(array $data)
//    {
//        return Validator::make($data, [
//            'name' => ['required', 'string', 'max:255'],
//        ]);
//    }
//    protected function created(Request $request)
//    {
//        return Role::create([
//            'name' => $request['name'],
//        ]);
//    }
}
