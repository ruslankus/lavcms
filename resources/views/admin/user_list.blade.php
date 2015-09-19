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
                    <h2>User List</h2>
                </div>
                <div class="pull-right">
                    <a href="#" class="btn btn-success">Add user</a>
                </div>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>login</th>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>E-mail</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $n =1; foreach($users as $user): ?>

                    <tr>

                        <td>{{ $n }}</td>
                        <td>{{ $user->login }}</td>
                        <td>{{ $user->fname }}</td>
                        <td>{{ $user->lname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="#" class="btn btn-xs btn-info">Edit</a>
                            <a href="#" class="btn btn-xs btn-danger">Delete</a>
                        </td>
                    </tr>

                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section> <!-- /main -->



@stop
