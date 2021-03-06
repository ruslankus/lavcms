<?php

namespace App\Http\Controllers\Admin;

use App\Models\SlideTrl;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Slides;
use App\Http\Requests\AddSlideRequest;
use App\Models\Languages;
use Illuminate\Support\Facades\View;

class SlidesController extends Controller
{

    public function __construct(){
        $this->middleware('adminLogin');
    }

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
     * @param $id
     * @return View
     */
    public function getSlideEdit($id){

        $slideObj = Slides::findOrFail((int)$id);

        return view('admin.slides.edit_slide', compact('slideObj'));
    }


    /**
     * @param AddSlideRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSlideEdit(AddSlideRequest $request, $id){

        $ds = DIRECTORY_SEPARATOR;
        $fileExt = $request->file('image')->getClientOriginalExtension();
        $fileName = uniqid() . ".{$fileExt}";

        $folderName = public_path("{$ds}images{$ds}slide_upload");

        $slideObj = Slides::findOrFail($id);
        $fullFileName = public_path("images{$ds}slide_upload{$ds}".$slideObj->img_name);
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

        $lngList = Languages::lists('lang_name','id')->toArray();
        $keys = array_keys($lngList);
        $actLngId = array_shift($keys);
        $slideObj = Slides::findOrFail($id);

        $slideContent = $slideObj->slide_trl()->where('lng_id','=',1)->get()->shift();

        return view('admin.slides.edit_slide_content',compact('slideObj','lngList','slideContent','actLngId'));
    }//getEditSlideContent


    /**
     * Get slide translation for Ajax action
     *
     * @param Request $request
     * @param $id - slide Id
     */
    public function postAjaxSlideContent(Request $request, $id){
        $lng_id = (int)$request->input('lng_id');
        $slideId = (int)$id;
        $slideContent = SlideTrl::OneTrlContent($slideId,$lng_id)->first();
        if(!empty($slideContent)){

            $partial = View::make('admin.slides.ajax._edit_slide_content',compact('slideContent','slideId'))->render();

            return (string)$partial;
        }else{
            $partial = View::make('admin.slides.ajax._create_slide_content',compact('lng_id','slideId'))->render();

            return (string)$partial;
        }

    }


    /**
     * Save slide caption and alt text for current language
     *
     * @param Request $request
     * @param $id
     */
    public function postAjaxSlideContentSave(Request $request, $id){

        $lng_id = (int)$request->input('current-lng-id');
        $slideId = (int)$id;

        $slideContent = SlideTrl::OneTrlContent($slideId,$lng_id)->first();
        if(empty($slideContent)){

            $slideContent = new SlideTrl();
            $slideContent->lng_id = $lng_id;
            $slideContent->slide_id = $slideId;
        }
        $slideContent->slide_alt = trim($request->input('alt'));
        $slideContent->slide_html = trim($request->input('text-area'));
        if($slideContent->save()){

            $partial = View::make('admin.slides.ajax._edit_slide_success',compact('lng_id','slideId'))->render();

            return (string)$partial;
        }else{
            //error
        }

    }//postAjaxSlideContentSave



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

        $fileName  = public_path('images/slide_upload/'.$slideObj->img_name);
        @unlink($fileName);
        $slideObj->delete();

        return redirect(action('Admin\SlidesController@getIndex'))
            ->with(['success_message' => 'Slide was deleted']);

    }
}
