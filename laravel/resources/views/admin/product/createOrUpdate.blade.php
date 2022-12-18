@extends('welcome')

@section('title' , 'Страница создания товара')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                @if(isset($product))
                    <h2>Редактирование продукта {{$product->model}}</h2>
                @else
                    <h2>Создание продукта</h2>
                @endif
                <form action="{{isset($product)? route('admin.products.update', ['product' => $product->id]) : route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($product))
                        <input name="_method" type="hidden" value="PUT">
                    @endif
                    <div class="mb-3">
                        <label for="exampleInputModel" class="form-label">Модель:</label>
                        <input type="text" name="model" class="form-control @error('model') is-invalid @enderror" id="exampleInputModel" aria-describedby="modelHelp" value="{{old('model')}}">
                        @error('model')<div id="modelHelp" class="form-text">{{$message}}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputCountry" class="form-label">Страна:</label>
                        <input type="text" name="country" class="form-control @error('country') is-invalid @enderror" id="exampleInputCountry" aria-describedby="countryHelp" value="{{old('country')}}">
                        @error('country')<div id="countryHelp" class="form-text">{{$message}}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputCompany" class="form-label">Компания:</label>
                        <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" id="exampleInputCompany" aria-describedby="companyHelp" value="{{old('company')}}">
                        @error('company')<div id="companyHelp" class="form-text">{{$message}}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDate" class="form-label">Год производства:</label>
                        <input type="number" name="date" class="form-control @error('date') is-invalid @enderror" id="exampleInputDate" aria-describedby="dateHelp" value="{{old('date')}}">
                        @error('date')<div id="dateHelp" class="form-text">{{$message}}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPhoto" class="form-label">Изображение:</label>
                        <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" id="exampleInputPhoto" aria-describedby="photoHelp" value="{{old('photo')}}">
                        @error('photo')<div id="photoHelp" class="form-text">{{$message}}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPrice" class="form-label">Цена:</label>
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="exampleInputPrice" aria-describedby="priceHelp" value="{{old('price')}}">
                        @error('price')<div id="priceHelp" class="form-text">{{$message}}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Категория:</label>
                        <select id="disabledSelect" name="category_id" class="form-select @error('category') is-invalid @enderror" aria-describedby="categoryHelp">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if(isset($product))
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
