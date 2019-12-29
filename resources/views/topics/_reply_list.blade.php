
@if(count($replies) > 0)
  <ul class="list-unstyled mt-4">
    @foreach($replies as $reply)
      <li class="list-item media">
        <div class="media-left">
          <img src="{{ $reply->user->avatar }}" class="media-object img-thumbnail mr-3" style="width:48px;height:48px" alt="{{ $reply->user->name }}">
        </div>

        <div class="media-body">
          <div class="media-heading">
            <a href="{{ route('users.show',$topic->user_id)}}">
              {{ $reply->user->name }}
            </a>
            <span> . </span>
            {{ $topic->created_at->diffForHumans() }}

            @can('destroy',$reply)
              <span class="float-right">
                <form method="POST" action="{{ route('replies.destroy',$reply->id)}}" onsubmit="return confirm('确定要删除此评论吗？');">
                 {{ csrf_field() }}
                 {{ method_field('DELETE')}}
                 <button type="submit" class="btn btn-default">
                   <i class="far fa-trash-alt"></i>

                 </button>
                </form>
              </span>
            @endcan


          </div>

          <div class="reply-content" style="word-break:break-all">
            {!!$reply->content!!}
          </div>

        </div>
      </li>

      @if(!$loop->last)
        <hr>
      @endif
    @endforeach
  </div>
@else
  <div class="empty-block">
    暂无内容
  </div>
@endif
