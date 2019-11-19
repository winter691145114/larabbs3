@foreach(['info','success','warning','danger'] as $msg)
  @if(session()->has($msg))
    <div class="message-flash">
      <p class="alert alert-{{ msg }}">
        {{ session()->get($msg) }}
      </p>
    </div>
  @endif
@endforeach
