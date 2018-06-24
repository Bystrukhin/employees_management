@extends('adminlte::page')
@section('title', 'Blexr employees')
@section('content')

    @foreach($permission as $item)
        <form method="post" action="{{route('admin.postEditPermission', ['permission_id'=>$item->id])}}">
            <div class="form-element">
                <label for="name">Permission name</label>
                <input type="text" name="name" id="name" value="{{$item->name}}">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Edit permission</button>
            {{ csrf_field() }}
        </form>
    @endforeach

@endsection