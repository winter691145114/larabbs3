@include('shared._errors')
<form method="POST" action="{{ route('replies.store')}}" accept-charset="utf-8">
  {{ csrf_field() }}
  <input type="hidden" name="topic_id" value="{{ $topic->id }}">

  <div class="form-group">
    <textarea rows="4" class="form-control" name="content" placeholder="请输入回复内容" required></textarea>
  </div>

  <div class="well">
    <button type="submit" class="btn btn-primary">
      回复
    </button>
  </div>
</form>
