@extends('admin_layout')

@section('css')
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<style type="text/css">
    .list  .table  tr > td {
        vertical-align: middle;
    }

</style>
@stop


@include('admin._nav')


@section('content')

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('success_message') }}</div>
    @endif


    <section id="list" class="container">
        <div class="filter clearfix">
            <h3 class="pull-left">Slides list</h3>
            <a href="#" class="btn btn-success pull-right">
                <span class="glyphicon glyphicon-plus"></span>Add slide
            </a>
        </div>


        <div class="list">
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>slide img</th>
                    <th>Active</th>
                    <th>actions</th>
                </tr>

                <?php $n =1;  foreach($slides as $slide):


                ?>
                <tr>
                    <td>{{$n}}</td>
                    <td><img src="/images/slide-1.jpg" width="300" /></td>
                    <td>Y</td>

                    <td>
                        <a href="{{action('Admin\MainController@getEditStruct',
                        ['id' => $slide->id])}}" class="btn btn-sm btn-success">
                            <span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit
                        </a>


                        <a href="{{ action('Admin\SlidesController@getDestroy',
                        ['id' => $slide->id ]) }}" class="btn btn-sm btn-danger slide-delete">
                        <span class="glyphicon glyphicon-trash"></span>&nbsp;Delete
                        </a>
                    </td>
                </tr>
                <?php $n++; endforeach?>
            </table>


        </div>
        <div>

        </div>
    </section>

@stop

@section('modal')

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Delete Slide </h4>
                </div>
                <div class="modal-body">
                    A you sure?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="#" class="btn btn-primary">Delete</a>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script src="/js/slides.js"></script>
@stop