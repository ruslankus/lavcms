@extends('admin_layout')

@section('css')
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
@stop


@include('admin._nav')


@section('content')

    <section id="main" class="container">
        <div class="row">
            <div class="col-md-12 clearfix">
                <div class="pull-left">
                    <h2>Edit slide</h2>
                </div>

            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div col-md-12>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active">
                        <a href="#home" >Image</a>
                    </li>
                    <li >
                        <a href="{!! action('Admin\SlidesController@getEditSlideContent',
                        ['id' => $slideObj->id]) !!}">Profile</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12" style="margin-top:20px;">

                {!!Form::open([ 'action' => ['Admin\SlidesController@postSlideEdit', 'id' => $slideObj->id],
                    'files' => true]) !!}

                    <div class="form-group col-md-7">
                        <label>Upload slide</label>
                        <input name="image" type="file" >
                        <div class="has-error">
                            Wrong file format
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-default">Save slide</button>
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-12">
            <h3>Slide photo</h3>
            <div>
                <img src="/images/slide_upload/{{ $slideObj->img_name }}" width="400" alt="..." class="img-thumbnail" >
            </div>

        </div>
    </section> <!-- /main -->


@stop

