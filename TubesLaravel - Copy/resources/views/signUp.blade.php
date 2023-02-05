<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cashierqu</title>
        <link rel="shortcut icon" type="image/svg" href="/assets/icons/succes.svg">
        <link rel="stylesheet" href="{{asset("/css/index.css")}}">
        <link rel="stylesheet" href="{{asset("/css/form.css")}}">
        <link rel="stylesheet" href="{{asset("/css/signUp.css")}}">
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins&display=swap" rel="stylesheet">
    </head>

    <body>
        <main class="main">
            <div class="form-cn">
                <h1 class="form__title"><span class="text-blue">Sign</span> Up</h1>
                <form class="form" action="/signUp" id="form" method="POST">
                    @csrf
                    
                    <div class="form__elemen">
                        <label class="form__label" for="username">Nama Supermarket</label><br>
                        <input class="form__input" type="text" name="inputNamaSupermarket" value="{{ old("inputNamaSupermarket") }}" id="inputNamaSupermarket" autofocus required>
                        @error("inputNamaSupermarket")
                            <label class="form__error" for="">{{$message}}</label>
                        @enderror
                    </div>
                    <div class="form__elemen">
                        <label class="form__label" for="username">Username</label><br>
                        <input class="form__input" type="text" name="inputUsername" id="inputUsername" value="{{ old("inputUsername") }}">
                        @error('inputUsername')
                            <label class="form__error" for="">{{$message}}</label>
                        @enderror
                    </div>
                    <div class="form__elemen">
                        <label class="form__label" for="judul">Password</label><br>
                        <input class="form__input" type="password" name="inputPassword" id="inputPassword" required>
                        @error('inputPassword')
                            <label class="form__error" for="">{{$message}}</label>
                        @enderror
                    </div>
                    <div class="form__elemen">
                        <label class="form__label" for="judul">Confirm Password</label><br>
                        <input class="form__input" type="password" name="inputConfirmPass" id="inputConfirmPass" required>
                        @error('inputConfirmPass')
                            <label class="form__error" for="">{{$message}}</label>
                        @enderror
                    </div>
                    <div class="form__elemen">
                        <input class="homepage__btn form__submit" type="submit" name="inputJudul" id="inputJudul" value="Sign up">        
                    </div>
                </form>
            </div>
            @if(session()->has("failed"))
                <div class="alert-cn">
                    <div class="alert alert-session">
                        <img class="alert__icn" src="assets/icons/error-circle-rounded-outline.svg" alt="">
                        <p class="alert__message">{{ session("failed") }}</p>
                        <button class="homepage__btn homepage__btn--primary alert__btn">OK</button>
                    </div>
                    <div class="overlay"></div>
                </div>
            @endif
            {{-- <div class="alert hidden">
                <img class="alert__icn" src="assets/icons/succes.svg" alt="">
                <p class="alert__message">Berhasil</p>
                <button class="homepage__btn homepage__btn--primary alert__btn">OK</button>
            </div> --}}
        </main>
        <script type="module" src="/js/signUp.js"></script>
    </body>
</html>