@extends('app')
@section('content')
    <div class="container">
        <h1>Edit Produc {{$product->name}}</h1>
        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <div class="well">
            {!! Form::open(['route'=>['products.update',$product->id],'method'=>'put']) !!}
            <fieldset>

                <legend>Register Product</legend>

                <!-- Name -->
                <div class="form-group ">
                    {!! Form::label('name', 'Name:', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10 paddingFormProduct">
                        {!! Form::text('name', $product->name, ['class' => 'form-control', 'placeholder' => 'name']) !!}
                    </div>
                </div>

                <!-- Description Area -->
                <div class="form-group ">
                    {!! Form::label('description', 'Description', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10 paddingFormProduct">
                        {!! Form::text('description', $product->description, ['class' => 'form-control', 'rows' => 3]) !!}

                    </div>
                </div>
                <div class="form-group ">
                    {!! Form::label('price', 'Price: R$', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10 paddingFormProduct">
                        {!! Form::text('price', $product->price, ['class' => 'form-control', 'placeholder' => 'price']) !!}
                    </div>
                </div>
                <!-- Select With One Default -->
                <div class="form-group ">
                    {!! Form::label('Featured', 'Featured?', ['class' => 'col-lg-2 control-label'] )  !!}
                    <div class="col-lg-10 paddingFormProduct">
                        {!!  Form::select('featured', ['1' => 'Yes', '0' => 'No'], $value  = $product->featured, ['class' => 'form-control' ]) !!}
                    </div>
                </div>
                <div class="form-group ">
                    {!! Form::label('Recommend', 'Recommend?', ['class' => 'col-lg-2 control-label'] )  !!}
                    <div class="col-lg-10 paddingFormProduct">
                        {!!  Form::select('recommend', ['1' => 'Yes', '0' => 'No'], $value  = $product->recommend, ['class' => 'form-control' ]) !!}
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        {!! Form::submit('Edit Product', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
                    </div>
                </div>

            </fieldset>
        </div>
    </div>

@endsection

