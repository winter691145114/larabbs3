@if(count($replies))
  <ul class="list-group border-0 mt-4">
    @foreach($replies as $reply)
      <li class="list-group-item border-left-0  border-right-0 border-top-0 ">
        <div class="topic-title">
          <a href="{{ route('topics.show',$reply->topic->id)}}" >
            {{ $reply->topic->title }}
          </a>
        </div>

        <div class="reply-content mt-3 mb-2">
          {!! $reply->content !!}

          @can('destroy',$reply)
            <span class="meta float-right">
              <form method="POST" action="{{ route('replies.destroy',$reply->id)}}" onsubmit="return confirm('您确定要删除这条评论吗？');">
                  {{ csrf_field() }}
                  {{ method_field('DELETE')}}
                  <button type="submit" class="btn btn-default btn-sm ">
                    <i class="far fa-trash-alt"></i>
                  </button>
              </form>

              </form>
            </span>
          @endcan
        </div>

        <small class="meta text-secondary">
          <i class=""></i>回复于{{ $reply->created_at->diffForHumans() }}
        </small>
      </li>

      @if(!$loop->last)
        <hr>
      @endif
    @endforeach
  </ul>

  <div class="mt-4 pt-3">
    {!!$replies->render()!!}
  </div>
@else
  <div class="empty-block">
    暂无数据
  </div>
@endif
