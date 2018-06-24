@extends('adminlte::page')
@section('title', 'Blexr employees')
@section('content')

    <form method="post" action="{{route('admin.post_add_employee')}}">
        <div class="form-element">
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
        </div>
        <br>
        <br>
        <div class="form-element">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" >
        </div>
        <br>
        <br>
        <div class="btn-group">
            <a href="#" class="btn btn-primary">Permissions</a>
            <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
            <ul class="dropdown-menu" style="padding: 10px" id="myDiv">
                @foreach($permissions as $permission)
                    <li><p><input type="checkbox" value="{{$permission->id}}" style="margin-right: 10px;" name="permissions[]">{{$permission->name}}</p></li>
                @endforeach
            </ul>
        </div>
        <br>
        <br>
        <button type="submit" class="btn btn-primary">Add user</button>
        {{ csrf_field() }}
    </form>

@endsection