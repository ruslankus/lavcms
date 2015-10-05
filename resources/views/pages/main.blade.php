<?php $locale = App::getlocale(); ?>
@extends('common_layout')

@section('content')
  @foreach($blocksResArr as $block)
  <div>

    {!! $block !!}

  </div>

  @endforeach
@stop