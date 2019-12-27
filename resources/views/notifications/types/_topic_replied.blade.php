<li class="media">
  <div class="media">
    <div class="media-left">
      <a href="{{ route('users.show',$notification->data['user_id'])}}" >
        <img src="{{ $notification->data['user_avatar']}}" class="media-object img-thumbnail mr-3 " style="width:48px;height:48px;" alt="{{ $notification->data['user_name']}}" >
      </a>
    </div>

    <div class="media-body">
      <div class="media-heading mt-0 mb-1 text-secondary">
        <a href="{{ route('users.show',$notification->data['user_id'])}}">
          {{ $notification->data['user_name']}}
        </a>
        评论了
        <a href="{{ $notification->data['topic_link']}}">
          {{ $notification->data['topic_title']}}
        </a>

        <span class="meta float-right" title="{{ $notification->created_at}}">
          <i class="far fa-clock"></i>
          {{ $notification->created_at->diffForHumans() }}
        </span>
      </div>

      <div class="reply-content">
        {!!$notification->data['reply_content']!!}
      </div>
    </div>
  </div>
</li>
