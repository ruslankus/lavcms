<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Slides;
use App\Http\Requests\AddSlideRequest;
use App\Models\Languages;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $slides = Slides::all();

        return view('admin.slides.index',compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreateSlide()
    {
        return view('admin.slides.add_slide');
   }




    /**
     * Store a newly created resource in storage.
     *
     * @param  AddSlideRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function postStoreSlide(AddSlideRequest $request)
    {

        $fileExt = $request->file('image')->getClientOriginalExtension();
        $fileName = uniqid() . ".{$fileExt}";

        $folderName = public_path('/images/slide_upload');

        $slideObj = new Slides();
        $slideObj->struct_id = 2;
        $slideObj->img_name = $fileName;
        if($slideObj->save()){
            $request->file('image')->move($folderName,$fileName);

            return redirect(action('Admin\SlidesController@getSlideEdit',['id' => $slideObj->id]));
        }else{
            //
        }

    }//postStoreSlide


    /**
     * @param $id - int - Slide ID
     */
    public function getSlideEdit($id){

        $slideObj = Slides::findOrFail((int)$id);

        return view('admin.slides.edit_slide', compact('slideObj'));
    }

    public function postSlideEdit(AddSlideRequest $request, $id){

        $ds = DIRECTORY_SEPARATOR;
        $fileExt = $request->file('image')->getClientOriginalExtension();
        $fileName = uniqid() . ".{$fileExt}";

        $folderName = public_path('/images/slide_upload');

        $slideObj = Slides::findOrFail($id);
        $fullFileName = app_path("images{$ds}slide_upload{$ds}".$slideObj->img_name);
        //deletign old file
        @unlink($fullFileName);
        //uplodink new file
        $slideObj->img_name = $fileName;
        if($slideObj->save()){
            $request->file('image')->move($folderName,$fileName);

            return redirect(action('Admin\SlidesController@getSlideEdit',['id' => $slideObj->id]))
                    ->with(['success_message' => 'Slide was updated' ]);
        }else{
            //
        }

    }//postSlideEdit

    public function getEditSlideContent($id){

        $lngList = Languages::lists('lang_name','id');
        $slideObj = Slides::findOrFail($id);

        $slideContent = $slideObj->slide_trl()->where('lng_id','=',1)->get()->shift();

        return view('admin.slides.edit_slide_content',compact('slideObj','lngList','slideContent'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified slide from db with all relations.
     *
     * @param  int  $id slide
     * @return \Illuminate\Http\Response
     */
    public function getDestroy($id)
    {
        $slideObj = Slides::findOrFail((int)$id);
        $slideObj->slide_trl()->delete();

        $fileName  = public_path('images/'.$slideObj->img_name);
        @unlink($fileName);
        $slideObj->delete();

        return redirect(action('Admin\SlidesController@getIndex'))
            ->with(['success_message' => 'Slide was deleted']);

    }
}
