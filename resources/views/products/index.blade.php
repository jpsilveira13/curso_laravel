@extends('app')
@section('content')
    <div class="container">

        <h1>Categories</h1>

        <br />
        <a href="{{route('products.create')}}" class="btn btn-primary">Novo Produto</a>
        <br />
        <br />
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Featured</th>
                <th>Recomend</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->featured}}</td>
                    <td>{{$product->recommend}}</td>
                    <td><a href="{{route('products.destroy',['id'=>$product->id])}}">DELETE</a> | <a href="{{route('products.edit',['id'=>$product->id])}}">EDIT</a></td>

                </tr>
            @endforeach
        </table>
    </div>

@endsection

