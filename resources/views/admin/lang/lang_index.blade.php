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
        <h3>User list</h3>
        <div class="list">
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>prefix</th>
                    <th>name</th>

                    <th>actions</th>
                </tr>

                <?php $n = 1; foreach($langs as $lng):?>
                <tr>
                    <td>{{$n}}</td>
                    <td>
                        {{$lng->prefix}}
                    </td>
                    <td>{{$lng->lang_name}}</td>

                    <td>
                        <a href="#" class="btn btn-sm btn-success">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                <?php $n++; endforeach?>
            </table>


        </div>
        <div>

        </div>
    </section>

@stop