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
                    <h2>Create slide</h2>
                </div>

                <div class="pull-right">
                    <a href="{!! action('Admin\SlidesController@getIndex') !!}" class="btn btn-default">
                        <span class="glyphicon glyphicon-share-alt"></span>
                    </a>
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

            </div>
            <div class="col-md-12" style="margin-top:20px;">
                <?=Form::open(['action'=>'Admin\SlidesController@postStoreSlide', 'files' => true]) ?>

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

                <?=Form::close() ?>
            </div>
        </div>

    </section> <!-- /main -->



@stop