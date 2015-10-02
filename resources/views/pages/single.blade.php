<?php $locale = App::getlocale(); ?>
@extends('common_layout')

@section('content')
    @include('navs._lang_switcher')


    main page

    <h3>locale : <?=$locale; ?></h3>
    <h4>params : <?=$one  ?></h4>
    <p>Prefix : {{$prefix}}</p>
@stop