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
                    <h2>Structure block #{{ $struct->id_name }} </h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-default">
                        <span class="glyphicon glyphicon-share-alt"></span>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
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

            @if (Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif

            <div class="col-md-12 ">


                <?=Form::model($struct,['method' => 'PATCH',
                        'action' => ['Admin\MainController@patchUpdateStruct','id' => $struct->id ]]) ?>

                    <div class="form-group col-md-7">
                        <label for="exampleInputEmail1">Block label</label>
                        {!! Form::text('label',null,['class' => 'form-control','placeholder' => 'Package name'] ) !!}
                    </div>


                    <div class="form-group col-md-7 clearfix">
                        <label for="exampleInputEmail1">Block section id (CSS)</label>
                        {!! Form::text('id_name',null,['class' => 'form-control','placeholder' => 'Package name'] ) !!}
                    </div>

                    <div class="checkbox col-md-7 ">
                        <label>
                            {!! Form::checkbox('active',null ) !!} Active
                        </label>
                    </div>

                    <div class="col-md-12">
                        <h3>Block name translation</h3>
                    </div>

                    <div class="col-md-12">
                        <?php foreach($struct->trl as $t):

                            $value = $t->trl;

                            if(Session::has("_old_input")){

                                $oldInput = Session::get('_old_input');
                                //dd($oldInput);
                                $value = $oldInput['trl'][$t->lng_id];
                            }
                        ?>


                        <div class="form-group col-md-7">
                            <label for="">{{ $lngList[$t->lng_id] }}</label>
                            <input type="text" class="form-control" name="trl[{!! $t->lng_id !!}]"
                                   value="{{$value}}">
                        </div>
                        <?php endforeach;?>

                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-default">Save changes</button>
                    </div>


                <?=Form::close() ?>
            </div>
        </div>

    </section> <!-- /main -->


@stop

