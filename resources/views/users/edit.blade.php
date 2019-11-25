@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3><i class="glyphicon glyphicon-edit"></i>编辑个人资料</h3>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('users.update',$user->id)}}" accept-charset="utf-8" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        @include('shared._errors')
                        <div class="form-group">
                            <label for="name" >用户名</label>
                            <input type="text" class="form-control" name="name" id="name"  value="{{ old('name',$user->name)}}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">邮箱：</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{ old('email',$user->email)}}">
                        </div>

                        <div class="form-group">
                            <label for="introd">个人简介</label>
                            <textarea class="form-control" rows="3" name="introd" id="introd" placeholder="">{{old('introd',$user->introduction)}}</textarea>
                        </div>

                        <div class="form-group mb-4">
                            <label for="">用户头像</label>
                            <input type="file" class="form-control-file" id="avatar" name="avatar">

                            @if($user->avatar)
                                <br>
                                <img src="{{ $user->avatar }}" class="thumbnail img-responsive" width="200px">
                            @endif
                        </div>

                        <div class="well well-sm">
                            <button type="submit" class="btn btn-primary">
                                保存
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
