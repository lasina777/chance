@extends('welcome')

@section('title' , 'Страница создания категории')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                @if(isset($category))
                    <h2>Редактирование категории {{$category->name}}</h2>
                @else
                    <h2>Создание категории</h2>
                @endif
                <form action="{{isset($category)? route('admin.categories.update', ['category' => $category->id]) : route('admin.categories.store')}}" method="POST">
                    @csrf
                    @if(isset($category))
                        <input name="_method" type="hidden" value="PUT">
                    @endif
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Наименование:</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" aria-describedby="nameHelp" value="{{old('name')}}">
                        @error('name')<div id="nameHelp" class="form-text">{{$message}}</div>@enderror
                    </div>
                    @if(isset($category))
                        <button type="submit" class="btn btn-primary">Редактировать</button>
                    @else
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    @endif
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
