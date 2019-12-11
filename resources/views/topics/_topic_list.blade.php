@if(count($topics))
  <ul class="list-unstyled">
    @foreach($topics as $topic)
      <li class="list-item ">
        <div class="media">
          <div class="media-left">

              <img class="media-object img-thumbnail mr-3 " src="{{ $topic->user->avatar }}" style="width:50px;height:50px" title="{{ $topic->user->name }}">

          </div>

          <div class="media-body">
            <div class="media-heading mt-0 mb-1">
              <a href="{{ $topic->link() }}">
                {{ $topic->title }}
              </a>

              <a href="{{ $topic->link() }}" class="float-right" >
                <span class="badge badge-pill badge-secondary">{{ $topic->reply_count }}</span>
              </a>
            </div>

            <small class="text-secondary meta">

                <i class="far fa-user"></i>
                <a href="{{ route('users.show',$topic->user->id)}}" title="{{ $topic->user->name }}" class="text-secondary">
                  {{ $topic->user->name }}
                </a>
                <span> • </span>



                <i class="far fa-folder"></i>
                <a href="#" title="{{ $topic->category->name }}" class="text-secondary">
                  {{ $topic->category->name }}
                </a>
                <span> • </span>


                <i class="far fa-clock"></i>
                <span  title="最后活跃于 ：{{ $topic->updated_at }}">{{ $topic->updated_at->diffForHumans() }}</span>
            </small>
          </div>

        </div>
      </li>
      <hr>

    @endforeach
  </ul>

  <div class="mt-4 pt-3">
    {!!$topics->appends(Request::except('page'))->render()!!}
  </div>
@else
  <div class="empty-block">
    暂无内容
  </div>
@endif
