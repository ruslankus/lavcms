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
                    <h2>Product List</h2>
                </div>
                <div class="pull-right">
                    <a href="{{ action('Admin\ProductController@getCreate') }}" class="btn btn-success">Add product</a>
                </div>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>product Name</th>
                        <th>category</th>
                        <th>photo</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>product name</td>
                        <td>cat name name</td>
                        <td></td>
                        <td>
                            <a href="{{ action('Admin\ProductController@getEdit',['id' => 1]) }}" class="btn btn-xs btn-info">Edit</a>
                            <a href="#" class="btn btn-xs btn-danger">Delete</a>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>product name</td>
                        <td>cat name name</td>
                        <td></td>
                        <td>
                            <a href="{{ action('Admin\ProductController@getEdit',['id' => 2]) }}" class="btn btn-xs btn-info">Edit</a>
                            <a href="#" class="btn btn-xs btn-danger">Delete</a>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section> <!-- /main -->


@stop