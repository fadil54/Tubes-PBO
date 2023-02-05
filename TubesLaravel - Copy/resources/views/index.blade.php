{{-- <?php echo public_path() . "\css\index.css" ?> --}}
<!DOCTYPE html>
<html>
    <head>
        <title>Cashierqu</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/svg" href="/assets/icons/succes.svg">
        <link rel="stylesheet" href="{{asset('css/index.css')}}">
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins&display=swap" rel="stylesheet">
    </head>

    <body>
        <header class="header">
            <div class="homepage" style="background-image: url({{asset("assets/image/market.png")}})">
                <h1 class="homepage__title">Cashierqu</h1>
                <p class="homepage__text">increase the productivity of your store <br>
                    by using Cashierqu</p>
                <button class="homepage__btn homepage__btn--primary"><a class="link" href="/companySignIn">Sign in as Company</a></button>
                <button class="homepage__btn homepage__btn--secondary"><a class="link" href="/cashierSignIn">Sign in as Cashier</a></button>
                <button class="homepage__btn homepage__btn--ternary"><a class="link" href="/signUp">Sign Up</a></button>
            </div>
        </header>
        {{-- <div class="alert">
            <img class="alert__icn" src="assets/icons/succes.svg" alt="">
            <p class="alert__message">Berhasil</p>
            <button class="homepage__btn homepage__btn--primary alert__btn">OK</button>
        </div> --}}
    </body>
    <script src="{{asset("js/index.js")}}"></script>
</html>
