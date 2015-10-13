@extends('admin_layout')

@section('meta')
    <meta name="_token" content="<?php echo csrf_token(); ?>">
@endsection

@section('css')

<style>
    .form-wrapper {
        padding-bottom:20px;
        position:relative;}

    .place-holder {
        position:absolute;
        width:100%;
        height:100%;
        z-index:2;
        top:0;
        left:0;
        background-color:rgba(0,0,0,0.20);}

    .place-holder  table  {
        width:100%;
        height:100%;}

    .place-holder table tr {}

    .place-holder table tr > td {
        text-align:center;}

</style>
@endsection

@section('content')

@include('admin._nav')


<section id="main" class="container">
    <div class="row">
        <div class="col-md-12 clearfix">
            <div class="pull-left">
                @if(empty($slideContent))
                    <h2>Create slide content</h2>
                @else
                    <h2>Edit slide content</h2>
                @endif
            </div>

            <div class="pull-right">
                <a href="{!! action('Admin\SlidesController@getIndex') !!}" class="btn btn-default">
                    <span class="glyphicon glyphicon-share-alt"></span>
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <ul class="nav nav-tabs" role="tablist">
                <li >
                    <a href="{!! action('Admin\SlidesController@getSlideEdit',['id' => $slideObj->id]) !!}" >Image</a>
                </li>
                <li class="active">
                    <a href="#profile">Profile</a>
                </li>
            </ul>
        </div>
        <div class="col-md-12" style="padding-top:10px">
            <div class="form-inline pull-right">
                <div class="form-group">

                    {!! Form::select('lng_id',$lngList,$actLngId,['class' => 'form-control lng_id']) !!}

                </div>
                <button class="btn btn-default">Change languge</button>
            </div>
        </div>
        <div class="col-md-12" style="margin-top:20px;">
            <div class="form-wrapper col-md-8">
                <form method="post" action="#" id="form">
                    <input type="hidden" name="slide-id" id="slide-id" value="{{ $slideObj->id }}">
                    <input type="hidden" name="current-lng-id" id="currrent-lng-id"
                           value="{{ $actLngId }}" >
                    <div class="form-group">
                        <label class="control-label">caption Text</label>
                        <textarea class="form-control" name="text-area" id="text-area">
                            <?=(!empty($slideContent->slide_html))? $slideContent->slide_html :''; ?>
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label class="control-label">alt text</label>
                        <input class="form-control" name="alt" type="text"
                               value="<?=(!empty($slideContent->slide_alt))? $slideContent->slide_alt :''; ?>" >

                    </div>

                    <div class="clearfix">
                        <button type="submit" id="save-content" class="btn btn-default">Save slide</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</section> <!-- /main -->



@stop

@section('js')
    <script src="/js/ckeditor/ckeditor.js"></script>
    <script src="/js/slides_edit.js"></script>
@stop