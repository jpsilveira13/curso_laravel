<h1>Exemplo 01 ;D</h1>

<ul>
    @foreach($categories as $category)
        <li>{{$category->name}}</li>

    @endforeach
</ul>