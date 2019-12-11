@extends('layouts.app')
@section('title',isset($category) ? $category->name  :'话题列表')

@section('content')
  <div class="row">
    <div class="col-md-9">
      @if(isset($category))
        <div class="alert alert-info">
          {{ $category->name }} : {{ $category->description }}
        </div>
      @endif
      <div class="card topic-list">
        <div class="card-header bg-transparent">
          <ul class="nav nav-pills">
            <li class="nav-item"><a href="{{ Request::url() }}?order=default" class="nav-link {{ active_class(!if_query('order','recent'))}}">最后回复</a></li>
            <li class="nav-item"><a href="{{ Request::url() }}?order=recent" class="nav-link {{ active_class(if_query('order','recent'))}}">最新发布</a></li>

          </ul>
          <hr class="mt-2">
          <div class="card-body ">
            @include('topics._topic_list',['topics'=>$topics])

          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      @include('topics._sidebar')
    </div>
  </div>

@stop
