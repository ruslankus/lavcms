<?php $locale = App::getlocale(); ?>
@extends('common_layout')

@section('content')
    @include('navs._lang_switcher')


    main page

    <h3>locale : <?=$locale; ?></h3>
    <p><a href="<?=action('PageController@getPage',['prefix' => $locale,'one' => 1])?>">Link</a></p>
@stop