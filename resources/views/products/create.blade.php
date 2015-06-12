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
            {!! Form::open(['route'=>'products.store']) !!}
            <fieldset>

                <legend>Register Product</legend>

                <!-- Name -->
                <div class="form-group ">
                    {!! Form::label('name', 'Name:', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10 paddingFormProduct">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
                    </div>
                </div>

                <!-- Description Area -->
                <div class="form-group ">
                    {!! Form::label('description', 'Description', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10 paddingFormProduct">
                        {!! Form::text('description', null, ['class' => 'form-control', 'rows' => 3]) !!}

                    </div>
                </div>
                <div class="form-group ">
                    {!! Form::label('price', 'Price: R$', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10 paddingFormProduct">
                        {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'price']) !!}
                    </div>
                </div>
                <!-- Select With One Default -->
                <div class="form-group ">
                    {!! Form::label('Featured', 'Featured?', ['class' => 'col-lg-2 control-label'] )  !!}
                    <div class="col-lg-10 paddingFormProduct">
                        {!!  Form::select('featured', ['1' => 'Yes', '0' => 'No'], $value  = null, ['class' => 'form-control' ]) !!}
                    </div>
                </div>
                <div class="form-group ">
                    {!! Form::label('Recommend', 'Recommend?', ['class' => 'col-lg-2 control-label'] )  !!}
                    <div class="col-lg-10 paddingFormProduct">
                        {!!  Form::select('recommend', ['1' => 'Yes', '0' => 'No'], $value  = null, ['class' => 'form-control' ]) !!}
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        {!! Form::submit('Add Product', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
                    </div>
                </div>

            </fieldset>
        </div>
    </div>
@endsection

