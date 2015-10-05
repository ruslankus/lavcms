@extends('admin_layout')

@section('css')
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
@stop


@include('admin._nav')


@section('content')

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <section id="list" class="container">
        <div class="filter">
            <h3 class="pull-left">Block list</h3>
            <div class="pull-right">

                <?=Form::open(['action' => 'Admin\MainController@postIndex','class' => 'form-inline']) ?>
                    <div class="form-group">

                        <label>Site language</label>

                        <?php echo Form::select('lng_id',$lngList,$lng_id,['class' => 'form-control']) ?>

                    </div>

                    <button type="submit" class="btn btn-default">Change lng</button>
                <?=Form::close(); ?>
            </div>
        </div>

        <div class="list">
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>block label</th>
                    <th>bloct id</th>
                    <th>Перевод</th>
                    <th>actions</th>
                </tr>

                <?php  foreach($structs as $str):

                    $strTrl = $str->trl->shift();
                ?>
                <tr>
                    <td>{{ $str->id}}</td>
                    <td>{{ $str->label }}</td>
                    <td>{{ $str->id_name}}</td>

                    <td>{{ $strTrl->trl }}</td>

                    <td>
                        <a href="#" class="btn btn-xs btn-success">Edit</a>
                        <a href="#" class="btn btn-xs btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endforeach?>
            </table>


        </div>
        <div>

        </div>
    </section>

@stop