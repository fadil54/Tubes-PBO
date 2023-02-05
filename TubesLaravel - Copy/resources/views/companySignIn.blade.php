<!DOCTYPE html>
<html>
    <head>
        <title>Cashierqu</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/svg" href="/assets/icons/succes.svg">
        <link rel="stylesheet" href="{{asset("css/index.css")}}">
        <link rel="stylesheet" href="{{asset("css/form.css")}}">
        <link rel="stylesheet" href="{{asset('css/signIn.css')}}">
    </head>

    <body>
        <main class="main">
            <div class="form-cn">
                <h1 class="form__title"><span class="text-blue">Sign</span> In</h1>
                <form class="form" action="/companySignIn" id="form" method="POST">
                    @csrf
                    <div class="form__elemen">
                        <label class="form__label" for="username">Username</label><br>
                        <input class="form__input" type="text" name="inputUsername" id="inputUsername" required autofocus>
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
                        <label for="" class="form__label form__label-password"><a class="form__label-password--link" href="changePass">Lupa password?</a></label>
                    </div>
                    <div class="form__elemen">
                        <!-- <a href="/src/app/html/goods.html"><input class="form__submit" type="submit" name="inputJudul" id="inputJudul" value="Sign in"></a>  
                               -->
                               <input class="form__submit" type="submit" name="inputJudul" id="inputJudul" value="Sign in">
                    </div>
                </form>
            </div>

            @if (session()->has("succes"))
            <div class="alert-cn">
                <div class="alert alert-session">
                    <img class="alert__icn" src="assets/icons/succes.svg" alt="">
                    <p class="alert__message">{{ session("succes") }}</p>
                    <button class="homepage__btn homepage__btn--primary alert__btn">OK</button>
                </div>
                <div class="overlay"></div>
            </div>
            @endif
            @if (session()->has("failed"))
            <div class="alert-cn">
                <div class="alert alert-session">
                    <img class="alert__icn" src="assets/icons/error-circle-rounded-outline.svg" alt="">
                    <p class="alert__message">{{ session("failed") }}</p>
                    <button class="homepage__btn homepage__btn--primary alert__btn">OK</button>
                </div>
                <div class="overlay"></div>
            </div>
            @endif
        </main>
        <script type="module" src="{{asset("/js/signIn.js")}}"></script>
    </body>
</html>
