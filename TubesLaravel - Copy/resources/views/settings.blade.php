<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/svg" href="/assets/icons/succes.svg">
    <link rel="stylesheet" href="{{asset("/css/index.css")}}">
    <link rel="stylesheet" href="{{asset("/css/form.css")}}">
    <link rel="stylesheet" href="{{asset("/css/settings.css")}}">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="form-cn">
            <h1 class="form__title"><span class="form__title--blue">Set</span>tings</h1>
            <form class="form form-supermarket" action="/settings-update-supermarket" id="form" method="POST">
                @csrf
                <h1 class="form__elemen-title">Supermarket</h1>
                {{-- <div class="form__elemen">
                    <label class="form__label" for="inputNamaSupermarket">Nama Supermarket</label><br>
                    <input class="form__input" type="text" name="inputNamaSupermarket" value="{{ Auth::user()->nama_supermarket }}" id="inputNamaSupermarket" required>
                </div> --}}
                <div class="form__elemen">
                    <label class="form__label" for="inputUsername">Username</label><br>
                    <input class="form__input" type="text" name="inputUsername" id="inputUsername" required>
                </div>
                {{-- <div class="form__elemen">
                    <label class="form__label" for="judul">Old Password</label><br>
                    <input class="form__input" type="password" name="inputOldPassword" value="" id="inputOldPassword" required>
                </div> --}}
                <div class="form__elemen">
                    <label class="form__label" for="judul">New Password</label><br>
                    <input class="form__input" type="password" name="inputNewPassword" id="inputNewPassword" required>
                </div>
                <div class="form__elemen">
                    <input class="form__submit" type="submit" name="submit" id="ChangeSupData" value="Change password">        
                </div>
            </form>

            <form class="form form-cashier" id="form" method="POST">
                @csrf
                <h1 class="form__elemen-title">Cashier Account</h1>
                <div class="form__elemen">
                    <label class="form__label" for="username">Username</label><br>
                    @if (Auth::user()->kasir === null)
                        <input class="form__input" type="text" name="inputUsername" id="" required> 
                    @else
                        <input class="form__input" type="text" name="inputUsername" value="{{ Auth::user()->kasir->user->username }}" id="inputKasirUsername" required maxlength="{{ strlen(Auth::user()->kasir->user->username) }}" autocomplete="off">
                    @endif
                </div>
                <div class="form__elemen">
                    <label class="form__label" for="username">Password</label><br>
                    <input class="form__input" type="password" name="inputPassword" id="inputPassword" required>
                </div>
                @if (Auth::user()->kasir === null)
                    <div class="form__elemen">
                        <input class="form__submit form__submit-create" type="submit" name="inputJudul" id="btnCreate" value="Create Account">        
                    </div>
                @else
                    <div class="form__elemen">
                        <input class="form__submit form__submit-update" type="submit" name="inputJudul" id="btnUpdate" value="Update">        
                    </div>
                @endif     
            </form>
        </div>


        <nav class="nav">
            <div class="nav__items">
                <nav class="nav__item">
                    <a href="http://<?= env('DB_HOST') ?>:8000/goods"><img class="nav__icon" src="{{asset("assets/icons/goods--outline.svg")}}" alt=""></a>
                </nav>
                <nav class="nav__item">
                    <a href="http://127.0.0.1:8000/history"><img class="nav__icon" src="{{asset("assets/icons/history--outline.svg")}}" alt=""></a>
                </nav>
                <nav class="nav__item">
                    <a href=""><img class="nav__icon" src="{{asset("assets/icons/settings--fill.svg")}}" alt=""></a>
                </nav>
                <nav class="nav__item">
                    <a href="http://127.0.0.1:8000/"><img class="nav__icon" src="{{asset("assets/icons/logout--outline.svg")}}" alt=""></a>
                </nav>
            </div>
        </nav>
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
    <script type="module" src="/js/settings.js"></script>
</body>
</html>