<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Requests\AdminRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    protected function store(Request $request)
    {
        $data = $request->all();
        $data['id_card'] = str_replace(" ", "", "$request->id_card");
        $data['tel'] = str_replace("-", "", "$request->tel");

        $this->validateCreate($data)->validate();
//        dd($request);
        Admin::create([
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'email' => $request['email'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'gender' => $request['gender'],
            'id_card' => $request['id_card'],
            'tel' => $request['tel'],
            'birthday' => $request['birthday'],
            'address' => $request['address'],
            'salary' => $request['salary'],
        ]);
        return redirect('admin/home');
    }
    protected function validateCreate(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'id_card' => ['required','string','max:20'],
            'tel' => ['required','string','max:20'],
            'birthday' => ['required'],
            'address' => ['required','string','max:255'],
            'salary' => ['nullable','string','max:100']
        ]);
    }

    public function update(Admin $admin, Request $request)
    {
        $id = auth()->user();
        $data = $request->all();
        $data['id_card'] = str_replace(" ", "", "$request->id_card");
        $data['tel'] = str_replace("-", "", "$request->tel");

        $this->validateEdit($data, $admin);
        $editAdmin = [
            'username' => $data['username'],
            'email' => $data['email'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'id_card' => $data['id_card'],
            'tel' => $data['tel'],
            'birthday' => $data['birthday'],
            'address' => $data['address'],
            'salary' => $data['salary'],
        ];

        if (!empty($request->password))
        {
            $newPassword = Hash::make($data['password']);
            $id->password = $newPassword;
        }

        $admin->update($editAdmin);
        return redirect()->back()->withSuccess('แก้ไขข้อมูลเรียบร้อย');
    }

    public function edit()
    {
        $admin = auth()->user();
        return view('admin.users.edit', compact('admin'));
    }

    public function validateEdit($data, $admin)
    {
        $rules = [
            'username' => ['required', 'string', 'max:50', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('admin')->ignore($admin)],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'id_card' => ['required','string','max:20'],
            'tel' => ['required','string','max:20'],
            'birthday' => ['required'],
            'address' => ['required','string','max:255'],
            'salary' => ['nullable','numeric','max:100']
        ];
        $customAttributes = [
            'username' => 'Username',
            'email' => 'Email',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'id_card' => 'ID Card',
            'tel' => 'Phone Number',
            'birthday' => 'Birthday',
            'address' => 'Address',
            'salary' => 'Salary',
        ];

        if (!empty($data['password'])) {
            $rules += ['password' => 'required|string|min:6|confirmed',];
            $customAttributes += ['password' => 'Password',];
        };
        Validator::make($data, $rules, [], $customAttributes)->validate();

    }
}
