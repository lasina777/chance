@extends('welcome')

@section('title' , 'Страница вывода товаров')

@section('content')
    <div class="container">
        @if(session()->has('create'))
            <div class="alert alert-success mt-2">Вы успешно создали продукт</div>
        @endif
        @if(session()->has('update'))
            <div class="alert alert-success mt-2">Вы успешно изменили продукт</div>
        @endif
        @if(session()->has('delete'))
            <div class="alert alert-danger mt-2">Вы успешно удалили продукт</div>
        @endif
        <div class="row">
            <div class="col"></div>
            <div class="col-12 row">
                @foreach( $products as $product)
                    <div class="card" style="width: 18rem;">
                        <img src="storage/{{$product->photo}}" style="width: 100%; height: 70%" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->model}}</h5>
                            <p class="card-text">Цена: {{$product->price}} руб.</p>
                            <a href="{{route('show', ['product' => $product->id])}}" class="btn btn-primary">Подробнее</a>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$products->links()}}
            <div class="col"></div>
        </div>
    </div>
@endsection
