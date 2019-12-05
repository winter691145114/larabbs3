@if(count($topics))
  <ul class="list-group border-0 mt-4 ">
    @foreach($topics as $topic)
      <li class="list-group-item pl-3 pr-3 border-left-0 border-right-0 @if($loop->first) border-top-0 @endif">
          <a href="{{ route('topics.show',$topic->id)}}">{{ $topic->title }}</a>

          <span class="meta float-right text-secondary">
            {{ $topic->reply_count }}回复
            <span> • </span>
            {{ $topic->created_at->diffForHumans() }}
          </span>
      </li>


    @endforeach
  </ul>

  <div class="mt-3 pt-3">
    {!!$topics->render()!!}
  </div>
@else
  <div class="empty-block">
    暂无内容
  </div>
@endif
