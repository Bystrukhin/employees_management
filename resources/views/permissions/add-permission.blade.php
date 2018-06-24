@extends('adminlte::page')
@section('title', 'Blexr employees')
@section('content')

    <form method="post" action="{{route('admin.postAddPermission')}}">
        <div class="form-element">
            <label for="name">Permission name</label>
            <input type="text" name="name" id="name">
        </div>
        <br>
        <br>
        <button type="submit" class="btn btn-primary">Add permission</button>
        {{ csrf_field() }}
    </form>

@endsection