<?php
namespace App\Http\Controllers;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    // injection de la request
    public function login(Request $request)
    {
        if($request->isMethod('post'))
        {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required',
                'remember' => 'in:remember'
            ]);

            $credentials = $request->only('email', 'password');

            $remember = false;

            if(!empty($request->input('remember'))) $remember = true;

            if(Auth::attempt($credentials, $remember))
            {
                return redirect('admin/post')->with(['message'=>'success']);
            }else{
                return back()
                    ->withInput($request->only('email'))
                    ->with(['message'=> 'mon coco c pas bon !!!']);
            }
        }
        return view('auth.login');
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->home()->with(['message' =>'succes logout']);
    }
}