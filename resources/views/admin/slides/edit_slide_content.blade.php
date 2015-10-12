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

                    {!! Form::select('lng_id',$lngList,'',['class' => 'form-control']) !!}

                </div>
                <button class="btn btn-default">Change languge</button>
            </div>
        </div>
        <div class="col-md-12" style="margin-top:20px;">
            <div class="form-wrapper col-md-8">
                <form method="post" action="#">

                    <div class="form-group">
                        <label class="control-label">caption Text</label>
                        <textarea class="form-control" id="text-area">
                            <?=(!empty($slideContent->slide_html))? $slideContent->slide_html :''; ?>
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label class="control-label">alt text</label>
                        <input class="form-control" type="text"
                               value="<?=(!empty($slideContent->slide_alt))? $slideContent->slide_alt :''; ?>" >

                    </div>

                    <div class="clearfix">
                        <button type="submit" class="btn btn-default">Save slide</button>
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