<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectPath = '/admin';
    protected $loginPath = '/admin/login';

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

        return redirect()->action('Admin\AdminController@getLogin');

    }


    /**
     * @param AdminFormRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postLogin(AdminRequest $request)
    {
        $credentials = $this->getCredentials($request);



        if (Auth::attempt($credentials, $request->has('remember'))) {
            return redirect()->action('Admin\AdminController@getIndex');
        }

        return redirect()->action('Admin\AdminController@getLogin')
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => $this->getFailedLoginMessage(),
            ]);
    }



}
