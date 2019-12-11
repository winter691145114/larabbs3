@extends('layouts.app')
@section('title',$topic->title)
@section('description',$topic->excerpt)
@section('content')
  <div class="row">
    <div class="col-md-3 col-lg-3 hidden-sm hidden-xs author-info">
      <div class="card">
        <div class="card-body">
          <h3 class="text-center">
            作者：{{ $topic->user->name }}
          </h3>
          <hr>
          <div class="media">
            <div align="center">
              <a href="{{ route('users.show', $topic->user->id )}}">
                <img src="{{ $topic->user->avatar }}" class="img-fluid thumbnail" style="width:300px;height:300px" alt="{{ $topic->user->name }}">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 topic-content">
      <div class="card">
        <div class="card-body">
          <h3 class="text-center mt-2">
            {{ $topic->title }}
          </h3>

          <div class="article-meta text-center text-secondary">
            {{ $topic->created_at->diffForHumans() }} .
            <i class="far fa-comment"></i>
            {{ $topic->reply_count }}
          </div>

          <div class="topic-body mt-4 mb-4">
            {!! $topic->body !!}
          </div>

          @can('update',$topic)

            <div class="operate ">
              <hr>
              <a href="{{ route('topics.edit',$topic->id)}}" class="btn btn-outline-primary btn-sm">
                <i class="fa fa-edit mr-2"></i>编辑
              </a>


              <form method="POST" action="{{ route('topics.destroy', $topic->id)}}" style="display:inline;" onsubmit="return confirm('您确定要删除吗？');" >
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button class="btn btn-outline-danger btn-sm " type="submit">
                  <i class="far fa-trash-alt"></i>删除
                  </button>
              </form>

            </div>
          @endcan
        </div>

      </div>


    </div>
  </div>



@endsection
