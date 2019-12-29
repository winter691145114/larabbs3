@if(count($replies) > 0)
  <ul class="list-unstyled mt-4">
    @foreach($replies as $reply)
      <li class="list-item">
        <div class="topic-title">
          <a href="{{ route('topics.show',$reply->topic->id)}}">
            {{ $reply->topic->title}}
          </a>


        </div>

        <div class="reply-content mt-2 mb-2" >
          {!!$reply->content!!}
        </div>

        <div class="meta text-secondary">
            <i class="far fa-clock"></i>
            回复于{{ $reply->created_at->diffForHumans() }}
          </div>
      </li>

      @if(!$loop->last)
        <hr>
      @endif
    @endforeach

    <div class="mt-4">
      {!!$replies->render()!!}
    </div>

  </ul>
@else
  <div class="empty-block">
    暂无数据
  </div>
@endif
