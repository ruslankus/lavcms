<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Requests\StructEditRequest;
use App\Models\Structure;
use App\Models\StructTrl;
use App\Models\Languages;


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
     *
     *
     */
    public function getIndex($lng_id = 1)
    {

        $lngList = Languages::lists('lang_name','id');

        $structs = Structure::with(['trl' => function($query) use($lng_id) {
            $query->where('lng_id','=',$lng_id);
        }])->get();

        return view('admin.main.index',compact('structs','lngList','lng_id'));
    }


    public function postIndex(Request $request){

        $lng_id = $request->input('lng_id');

        $lngList = Languages::lists('lang_name','id');

        $structs = Structure::with(['trl' => function($query) use($lng_id) {
            $query->where('lng_id','=',$lng_id);
        }])->get();

        return view('admin.main.index',compact('structs','lngList','lng_id'));
    }


    /**
     *
     *  @param int $id - Structure id
     */
    public function getEditStruct($id){

        $lngList = Languages::lists('lang_name','id');

        $struct = Structure::with('trl')->findOrFail((int)$id);

        return view('admin.main.edit_struct',compact('lngList','struct'));
    }


    public function patchUpdateStruct(StructEditRequest $request, $id ){


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


    /* Get the login username to be used by the controller.
    *
    * @return string
    */
    public function loginUsername()
    {
        return property_exists($this, 'username') ? $this->username : 'login';
    }



}
