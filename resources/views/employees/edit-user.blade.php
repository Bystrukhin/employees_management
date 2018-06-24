@extends('adminlte::page')
@section('title', 'Blexr employees')
@section('content')

    @foreach($user as $item)
    <form method="post" action="{{route('admin.postEditUser', ['user_id'=>$item->id])}}">
        <div class="form-element">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{$item->name}}">
        </div>
        <br>
        <br>
        <div class="form-element">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{$item->email}}">
        </div>
        <br>
        <br>
        <div class="btn-group">
            <a href="#" class="btn btn-primary">Permissions</a>
            <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
            <ul class="dropdown-menu" style="padding: 10px" id="myDiv">
                @foreach($permissions as $permission)
                    <li><p><input type="checkbox" @if($item->permissions->contains($permission->id)) checked @endif value="{{$permission->id}}" style="margin-right: 10px;" name="permissions[]">{{$permission->name}}</p></li>
                @endforeach
            </ul>
        </div>
        <br>
        <br>
        <button type="submit" class="btn btn-primary">Edit user</button>
        {{ csrf_field() }}
    </form>
    @endforeach

@endsection