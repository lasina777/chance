@extends('welcome')

@section('title' , 'Страница вывода товара')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-12 row">
                <div class="card mt-2">
                    <h5 class="card-title">{{$product->model}}</h5>
                    <div class="card-body text-center">
                        <img src="/storage/{{$product->photo}}" class="card-img-top w-50" alt="...">
                        <p class="card-text">Страна производства: {{$product->country}}</p>
                        <p class="card-text">Компания: {{$product->company}}</p>
                        <p class="card-text">Год производства: {{$product->date}}</p>
                        <p class="card-text">Категория: {{$product->category->name}}</p>
                        <p class="card-text">Цена: {{$product->price}} руб.</p>
                        @auth
                            <div class="btn-group">
                                @if(session()->has('basket'))
                                    @if(isset(session('basket')[$product->id]))
                                        <a class="btn btn-success" href="{{route('order.basket')}}">Перейти в корзину</a>
                                    @else
                                        <a class="btn btn-success" href="{{route('order.basketAdd', ['product' => $product->id])}}">Добавить в корзину</a>
                                    @endif
                                @else
                                    <a class="btn btn-success" href="{{route('order.basketAdd', ['product' => $product->id])}}">Добавить в корзину</a>
                                @endif
                                @if(\Illuminate\Support\Facades\Auth::user()->role=='Администратор')
                                    <a href="{{route('admin.products.edit', ['product' => $product->id])}}" class="btn btn-primary">Редактировать</a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Удалить
                                    </button>
                                @endauth
                            </div>
                        @endauth
                        @guest
                            <div class="small">Для добавления товара в корзину, вам необходимо <a href="{{route('login')}}">авторизироваться</a></div>
                        @endguest
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Удаление товара {{$product->model}}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Вы точно хотите удалить товар {{$product->model}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Отклонить</button>
                        <form action="{{route('admin.products.destroy', ['product' => $product->id] )}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf
                            <button type="submit" class="btn btn-primary">Подтвердить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
