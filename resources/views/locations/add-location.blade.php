@extends('adminlte::page')
@section('title', 'Blexr employees')
@section('content')

    <form method="post" action="{{route('admin.postAddLocation')}}">
        <div class="form-element">
            <label for="address">Location address</label>
            <input type="text" name="address" id="address">
        </div>
        <br>
        <br>
        <button type="submit" class="btn btn-primary">Add location</button>
        {{ csrf_field() }}
    </form>

@endsection