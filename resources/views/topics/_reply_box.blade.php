@include('shared._errors')

<div class="reply-box">
  <form method="POST" action="{{ route('replies.store')}}" accept-charset="UTF-8">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="topic_id" value="{{ $topic->id }}">
    <div class="form-group">
      <textarea rows="3" class="form-control" name="content" id="content" placeholder="分享你的见解~"></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-share mr-1"></i>回复</button>
  </form>
</div>
<hr>
