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
                'password' => 'required'
            ]);


            // récupère un tableau associatif email password
            $credentials = $request->only('email', 'password');
            //dd(Auth::attempt($credentials));
            if(Auth::attempt($credentials))
            {
                // ici on passé avec succès authentification (middleware auth)
                // et donc on a accès à nos routes protégées
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
        return redirect('/')->with(['message' =>'succes logout']);
    }
}