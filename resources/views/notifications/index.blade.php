@extends('layouts.app')
@section('title','回复列表')
@section('content')
  <div class="col-md-10 offset-md-1">
    <div class="card">
      <div class="card-body">
        <h3 class="text-xs-center">
          <i class="far fa-bell mr-2"></i>回复列表
        </h3>

        @if(count($notifications) > 0)
          <div class="list-unstyled notification-list mt-4">
            @foreach($notifications as $notification )
              @include('notifications.type._'.snake_case(class_basename($notification->type)))
            @endforeach

            {!! $notifications->render()!!}
          </div>
        @else
          <div class="empty-block">
            暂无数据
          </div>
        @endif

      </div>
    </div>
  </div>
@stop
