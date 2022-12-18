@extends('welcome')

@section('title' , 'Страница регистрации')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                @auth
                    <div class="alert alert-danger">Вы уже авторизированы, повторная регистрация запрещена</div>
                @endauth
                @guest
                    <form action="{{route('register')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Ваше имя:</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" aria-describedby="nameHelp" value="{{old('name')}}">
                            @error('name')<div id="nameHelp" class="form-text">{{$message}}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputSurname" class="form-label">Ваша фамилия:</label>
                            <input type="text" name="surname" class="form-control @error('surname') is-invalid @enderror" id="exampleInputSurname" aria-describedby="surnameHelp" value="{{old('surname')}}">
                            @error('surname')<div id="surnameHelp" class="form-text">{{$message}}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPatronymic" class="form-label">Ваше отчество:</label>
                            <input type="text" name="patronymic" class="form-control @error('patronymic') is-invalid @enderror" id="exampleInputPatronymic" aria-describedby="patronymicHelp" value="{{old('patronymic')}}">
                            @error('patronymic')<div id="patronymicHelp" class="form-text">{{$message}}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputLogin" class="form-label">Ваш логин:</label>
                            <input type="text" name="login" class="form-control @error('login') is-invalid @enderror" id="exampleInputLogin" aria-describedby="loginHelp" value="{{old('login')}}">
                            @error('login')<div id="loginHelp" class="form-text">{{$message}}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail" class="form-label">Ваша почта:</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" value="{{old('email')}}">
                            @error('email')<div id="emailHelp" class="form-text">{{$message}}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword" class="form-label">Ваш пароль:</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword" aria-describedby="passwordHelp">
                            @error('password')<div id="passwordHelp" class="form-text">{{$message}}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPasswordConfirmation" class="form-label">Ваш пароль повторно:</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="exampleInputPasswordConfirmation" aria-describedby="password_confirmationHelp">
                            @error('password_confirmation')<div id="password_confirmationHelp" class="form-text">{{$message}}</div>@enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="rules" class="form-check-input @error('rules') is-invalid @enderror" id="exampleCheck1" aria-describedby="rulesHelp">
                            <label class="form-check-label" for="exampleCheck1">Согласие с правилами</label>
                            @error('rules')<div id="rulesHelp" class="form-text">{{$message}}</div>@enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Регистрация</button>
                    </form>
                @endguest
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
