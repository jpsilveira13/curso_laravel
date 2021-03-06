@extends('app')
@section('content')
    <div class="container">

        <h1>Images of {{$product->name}}</h1>

        <br />
        <a href="{{route('products.images.create',['id' =>$product->id])}}" class="btn btn-primary">New Image'</a>
        <br />
        <br />
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Extension</th>
                <th>Action</th>
            </tr>
            @foreach($product->images as $image)
                <tr>
                    <td>{{$image->id}}</td>
                    <td>
                        <img src="{{url('uploads/'.$image->id.'.'.$image->extension)}}" width="80"/>
                    </td>
                    <td>{{$image->extension}}</td>
                    <td>
                    <td><a href="{{route('products.images.destroy',['id'=>$image->id])}}">DELETE</a> |  <a href="{{route('products.edit',['id'=>$image->product->id])}}">EDIT</a></td>
                    </td>
                </tr>
            @endforeach
        </table>
        <a href="{{route('products')}}" class="btn btn-default">Voltar</a>

    </div>

@endsection

