@extends('adminlte::page')
@section('title', 'Blexr employees')
@section('content')

    @foreach($location as $item)
        <form method="post" action="{{route('admin.postEditLocation', ['location_id'=>$item->id])}}">
            <div class="form-element">
                <label for="address">Location address</label>
                <input type="text" name="address" id="address" value="{{$item->address}}">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Edit location</button>
            {{ csrf_field() }}
        </form>
    @endforeach

@endsection