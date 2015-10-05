<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Middleware\LangInit;
use App\Models\Structure;
use Illuminate\Support\Facades\View;


class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex($prefix = null)
    {
        $blocksResArr = [];
        $blocksArr = [];
        $currLngId = LangInit::$lng_id;

        $blocksArr = Structure::lists('id_name');

        foreach($blocksArr as $blk){

            $name = '_'.$blk;
            $blocksResArr[] = $this->$name();
        }


        return view('pages.main',compact('blocksResArr'));
    }

    public function getPage(Request $request,$prefix, $one = null){

        //dd($request);
        return view('pages.single',compact('one', 'two','three','four','prefix'));
    }



    public function getProducts(){

        return 'ProductPage ';
    }


    //render partials parts

    private function _home(){

        $partialView = (string)View::make("blocks._home");

        return $partialView;
    }

    private function _slides(){

        $partialView = (string)View::make("blocks._slides");

        return $partialView;
    }

    private function _product_info(){

        $partialView = (string)View::make("blocks._product_info");

        return $partialView;
    }

    private function _uniq_details(){

        $partialView = (string)View::make("blocks._uniq_details");

        return $partialView;
    }

    private function _history(){

        $partialView = (string)View::make("blocks._history");
        return $partialView;
    }

    private function _testimonials(){

        $partialView = (string)View::make("blocks._testimonials");
        return $partialView;
    }

    private function _about_me(){
        $partialView = (string)View::make("blocks._about_me");
        return $partialView;
    }

    private function _contacts(){
        $partialView = (string)View::make("blocks._contacts");
        return $partialView;
    }
}
