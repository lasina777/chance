@extends('welcome')

@section('title' , 'Страница rfntujhbq')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                @if(session()->has('create'))
                    <div class="alert alert-success mt-2">Вы успешно создали категорию</div>
                @endif
                @if(session()->has('update'))
                    <div class="alert alert-success mt-2">Вы успешно изменили категорию</div>
                @endif
                @if(session()->has('delete'))
                    <div class="alert alert-danger mt-2">Вы успешно удалили категорию</div>
                @endif
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Наименование</th>
                        <th scope="col">Функции</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{$category->id}}</th>
                                <td>{{$category->name}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('admin.categories.edit', ['category' => $category->id])}}" class="btn btn-primary">Редактировать</a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$category->id}}">
                                            Удалить
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Удаление категории {{$category->name}}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Вы точно хотите удалить категорию {{$category->name}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                                            <form action="{{route('admin.categories.destroy', ['category' => $category->id])}}" method="POST">
                                                <input type="hidden" name="_method" value="DELETE">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Подтверждаю</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
