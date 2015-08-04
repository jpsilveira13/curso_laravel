@extends('app')
@section('content')
    <div class="container">

        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <div class="well">
            {!! Form::open(['route'=>['products.images.store', $product->id], 'method' => 'post', 'enctype'=>"multipart/form-data"]) !!}
            <fieldset>

                <legend>Upload Images</legend>

                <div class="form-group ">
                    {!! Form::label('image', 'Image:', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10 paddingFormProduct">
                        {!! Form::file('image', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        {!! Form::submit('Upload Image', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
                        <a href="{{route('products')}}" class="btn btn-default">Voltar</a>
                    </div>
                </div>

            </fieldset>
        </div>
    </div>
@endsection

