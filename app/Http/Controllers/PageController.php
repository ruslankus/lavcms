<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex($prefix = null)
    {
        return view('pages.main');
    }

    public function getPage(Request $request,$prefix, $one = null){

        //dd($request);
        return view('pages.single',compact('one', 'two','three','four','prefix'));
    }



    public function getProducts(){

        return 'ProductPage ';
    }
}
