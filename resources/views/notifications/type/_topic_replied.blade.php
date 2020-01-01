<li class="list-unstyled-item media @if(!$loop->last) border-bottom @endif">
  <div class="media-left">
    <img src="{{ $notification->data['user_avatar']}} " class="media-object img-thumbnail mr-3" style="width:57px;height:57px" alt="{{ $notification->data['user_name']}}">
  </div>

  <div class="media-body">
    <div class="media-heading mt-1 mb-1">
      <a href="{{ route('users.show',$notification->data['user_id'])}}">{{ $notification->data['user_name']}}</a>
      评论了
      <a href="{{ route('topics.show',$notification->data['topic_id'])}}">{{ $notification->data['topic_title']}}</a>

      <span class="meta float-right">
        <i class="far fa-clock"></i>{{ $notification->created_at->diffForHumans() }}
      </span>
    </div>

    <div class="reply-content" style="word-break:break-all">
      {!! $notification->data['reply_content']!!}
    </div>

  </div>
</li>
