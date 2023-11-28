<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use SebastianBergmann\Type\VoidType;



class UserController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new user();
    }

    public function getuser(): View
    {

        $getuser = $this->user->getalluser();

        return view('home', compact('getuser'));
    }

    public function postuser(Request $request)
    {
        // $error = $request->validate([
        //     'name' => 'required',

        //     'email' => 'required',
        //     'password' => 'required',
        // ], [
        //     'name.required' => 'ho ten can nhap',

        //     'email.required' => 'email bat buoc phai nhap',
        //     'password.required' => 'password bat buoc phai nhap',

        //     // 'email.email' => 'email ko dung dinh dang'
        // ]);
        dd($request);
        $error = $request->validate([
            'name' => 'required|min:2|max:255'
        ]);
        if ($error) {
            dd(1);
        } else {
            dd(2);
        }
        $data = [
            $request->name,
            Hash::make($request->password),
            $request->email,

        ];
        dd($data);

        if (!$data) {
            return redirect()->back()->withErrors('error')->withInput();
        } else {
            $this->user->adduser($data);
            return  redirect('/register')->with("massage", 'thanh cong');
        }


        //     public function update($id)
        //     {
        //         $user = user::find($id);
        //         if ($user) {
        //             return 
        //         }
        //     }
    }
}
