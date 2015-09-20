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
                    <h2>Create product</h2>
                </div>

            </div>
            <div class="col-md-12">
                <form method="post" action="#">
                    <div class="form-group col-md-7">
                        <label for="exampleInputEmail1">Product name</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Product name">
                    </div>

                    <div class="form-group col-md-7">
                        <label for="">Product category</label>
                        <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>

                    <div class="form-group col-md-7">
                        <label>Product photo</label>
                        <input type="file" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-default">Save product</button>
                    </div>

                </form>
            </div>
        </div>

    </section> <!-- /main -->


@stop