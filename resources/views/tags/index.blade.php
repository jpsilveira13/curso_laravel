@extends('app')
@section('content')
    <div class="container">
        <h1>Categories</h1>

        <br />
        <a href="{{route('tags.create')}}" class="btn btn-primary">Nova Tag</a>
        <br />
        <br />
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>

            </tr>
            @foreach($tags as $tag)
            <tr>
                <td>{{$tag->id}}</td>
                <td>{{$tag->name}}</td>

                <td><a href="{{route('tags.destroy',['id'=>$tag->id])}}">DELETE</a> | <a href="{{route('tags.edit',['id'=>$tag->id])}}">EDIT</a></td>
            </tr>
            @endforeach
        </table>
        {!! $tags->render()!!}
    </div>

@endsection

