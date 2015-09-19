<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;


class MainController extends Controller
{

    use AuthenticatesUsers;




    public function __construct(){
        $this->middleware('adminLogin',['except' => ['getLogin','postLogin']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return 'Admin index';
    }


    public function getLogin(){
        return view('admin.login');
    }



    public function getLogout(){
        Auth::logout();

        return redirect()->action('Admin\MainController@getLogin');

    }


    /**
     * @param AdminFormRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postLogin(AdminRequest $request)
    {
        $credentials = $this->getCredentials($request);


        if (Auth::attempt($credentials, $request->has('remember'))) {
            return redirect()->action('Admin\MainController@getIndex');
        }

        return redirect()->action('Admin\MainController@getLogin')
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => $this->getFailedLoginMessage(),
            ]);
    }



}
