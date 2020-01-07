<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
  <div class="container">

    <a class="navbar-brand " href="{{ url('/') }}">
      LaraBBS
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"><a href="{{ route('topics.index')}}" class="nav-link {{ active_class(if_route('topics.index'))}}">话题</a></li>
        <li class="nav-item"><a href="{{ route('categories.show',1)}}" class="nav-link {{ category_nav_active(1) }} ">分享</a></li>
        <li class="nav-item"><a href="{{ route('categories.show',2)}}" class="nav-link {{ category_nav_active(2) }}">教程</a></li>
        <li class="nav-item"><a href="{{ route('categories.show',3)}}" class="nav-link {{ category_nav_active(3)}}">问答</a></li>
        <li class="nav-item"><a href="{{ route('categories.show',4)}}" class="nav-link {{ category_nav_active(4) }}">公告</a></li>


      </ul>


      <ul class="navbar-nav navbar-right">

      @guest
        <li class="nav-item"><a class="nav-link" href="{{ route('login')}}">登录</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('register')}}">注册</a></li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('topics.create')}}" title="创建话题">
            <i class="fa fa-plus"></i>
          </a>
        </li>

        <li class="nav-item notification-badge">
          <a class="nav-link badge badge-pill badge-{{ Auth::user()->notification_count>0 ? 'hint' : 'secondary'}} mt-2 text-white" href="{{ route('notifications.index') }} " >
            {{ Auth::user()->notification_count }}
          </a>
        </li>

        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="ture" aria-expanded="false" id="DD" role="button">
            <img src="{{ Auth::user()->avatar }}" class="img-thumbnail img-circle" width="30px" height="30px" >
            {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu" aria-labelledby="DD">
            @can('manage_contents')
              <a href="{{ url(config('administrator.uri')) }}" class="dropdown-item">
                <i class="fas fa-tachometer-alt mr-2"></i>
                管理后台
              </a>
            @endcan
            <a href="{{ route('users.show',Auth::id()) }}" class="dropdown-item">
              个人中心
            </a>
            <a href="{{ route('users.edit',Auth::id()) }}" class="dropdown-item">
              编辑资料
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" role="button">
              <form method="POST" action="{{ route('logout')}}">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-block btn-danger">退出登录</button>
              </form>
            </a>

          </div>
        </li>
      @endguest
      </ul>
    </div>
  </div>
</nav>
