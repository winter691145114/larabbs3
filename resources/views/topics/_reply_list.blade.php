@if(count($replies))
  <ul class="list-group mt-6">
    @foreach($replies as $reply)
      <li class="list-group-item border-left-0 border-right-0 border-top-0">
        <div class="media">
          <div class="media-left mr-3">
            <img src="{{ $reply->user->name }}" class="media-object" style="width:50px;height:50px;">
          </div>

          <div class="media-body">
            <div class="media-heading mt-0 mb-1">
              <a href="{{ route('users.show', $reply->user_id )}}">
                {{ $reply->user->name }} • {{ $reply->created_at->diffForHumans() }}
              </a>
              @can('destroy',$reply)
                <span class="meta float-right">
                  <form method="POST" action="{{ route('replies.destroy',$reply->id)}}" onsubmit="return confirm('您确定要删除这条评论吗？');">
                    {{ csrf_field() }}
                    {{ method_field('DELETE')}}
                    <button type="submit" class="btn btn-default btn-sm ">
                      <i class="far fa-trash-alt"></i>
                    </button>
                  </form>
                </span>
              @endcan
            </div>



            <div class="reply-content text-secondary" style="word-break:break-all">
              {!!$reply->content!!}
            </div>
          </div>
        </div>
      </li>

      @if(!$loop->last)
        <hr>
      @endif
    @endforeach
  </ul>


@else
  <div class="empty-block">
    暂无数据
  </div>
@endif
