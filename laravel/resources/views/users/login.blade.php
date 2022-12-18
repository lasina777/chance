@extends('welcome')

@section('title' , 'Страница авторизации')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                @error('error')
                    <div class="alert alert-danger mt-2">Логин или пароль не верный</div>
                @enderror
                @auth
                    <div class="alert alert-danger mt-2">Вы уже авторизированы, повторная авторизация запрещена</div>
                @endauth
                @guest
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputLogin" class="form-label">Ваш логин:</label>
                            <input type="text" name="login" class="form-control @error('login') is-invalid @enderror" id="exampleInputLogin" aria-describedby="loginHelp" value="{{old('login')}}">
                            @error('login')<div id="loginHelp" class="form-text">{{$message}}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword" class="form-label">Ваш пароль:</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword" aria-describedby="passwordHelp">
                            @error('password')<div id="passwordHelp" class="form-text">{{$message}}</div>@enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Авторизация</button>
                    </form>
                @endguest
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
