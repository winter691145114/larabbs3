@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card">
      <div class="card-body">
        <h2>
          <i class="fa fa-edit"></i>
          @if($topic->id)
            更新帖子
          @else
            创建帖子
          @endif
        </h2>
        <hr>

        @if($topic->id)
          <form method="POST" action="{{ route('topics.update',$topic->id)}}" accept-charset="UTF-8">
            <input type="hidden" name="_method" value="PUT">
        @else
          <form method="POST" action="{{ route('topics.store')}}" accept-charset="UTF-8">
        @endif
            {{ csrf_field() }}
            @include('shared._errors')
            <div class="form-group">
              <input type="text" class="form-control" name="title" id="title" value="{{ old('title',$topic->title)}}" placeholder="标题不少于2个字符" required>
            </div>

            <div class="form-group">
              <select class="form-control" id="category_id" name="category_id" required>
                <option value="" hidden disabled {{ $topic->id ? '' : 'selected'}}>请选择分类</option>
                @foreach($categories as $value)
                  <option value="{{ $value->id }}" {{ $topic->category_id == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <textarea rows="6" class="form-control" name="body" id="body" placeholder="文章内容不少于3个字符">{{ old('body',$topic->body) }}</textarea>
            </div>


            <div class="well well-sm">
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-save mr-2"></i>保存
              </button>

            </div>

          </form>

      </div>
    </div>
  </div>
</div>


@endsection

@section('styles')
  <link type="text/css" rel="stylesheet" href="{{ asset('css/simditor.css')}}" >
@stop

@section('scripts')
  <script type="text/javascript" src="{{ asset('js/module.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/hotkeys.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/uploader.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/simditor.js') }}"></script>

  <script>
    $(document).ready(function() {
      var editor = new Simditor({
        textarea: $('#body'),
        upload: {
          url: '{{ route('topics.upload_image') }}',
          params: {
            _token: '{{ csrf_token() }}'
          },
          fileKey: 'upload_file',
          connectionCount: 3,
          leaveConfirm: '文件上传中，关闭此页面将取消上传。'
        },
        pasteImage: true,
      });
    });
  </script>
@stop
