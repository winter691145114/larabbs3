<div class="card">
  <div class="card-body">
    <a href="{{ route('topics.create')}}" type="btn btn-primary btn-block">
      <i class=""></i>新建帖子
    </a>
  </div>
</div>

  @if(count($active_users) >0)
    <div class="card active-users mt-4">
      <div class="card-body">
        <h3 class="text-center text-muted">活跃用户</h3>
        <hr>
        @foreach($active_users as $user)
          <a class="media" href="{{ route('users.show',$user->id)}}">
            <div class="media-left">
              <img src="{{ $user->avatar }}" class="media-object img-thumbnail mr-3">
            </div>
            <div class="media-body">
              <div class="media-heading">
                {{ $user->name }}
              </div>
            </div>
          </a>
        @endforeach
      </div>
    </div>
  @endif

  @if(count($links) > 0)
    <div class="card cache-links mt-4">
      <div class="card-body">
        <h3 class="text-center text-muted">推荐资源</h3>
        <hr>
        @foreach($links as $link)
          <a href="{{ $link->link }}" class="media">
            <div class="media-body ml-3">
              <span class="media-heading">
                {{ $link->title }}
              </span>
            </div>
          </a>
        @endforeach
      </div>
    </div>
  @endif
