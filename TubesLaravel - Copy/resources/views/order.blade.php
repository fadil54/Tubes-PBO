{{-- {{ dd(Auth::user()->role) }} --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset("css/index.css")}}">
    <link rel="stylesheet" href="{{asset("css/form.css")}}">
    <link rel="stylesheet" href="{{asset("css/order.css")}}">
    <link rel="shortcut icon" type="image/svg" href="/assets/icons/succes.svg">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="col-2">
            <div class="cart">  
                <h1 class="form__title"><span class="form__title--blue">Shopping</span> Cart</h1>
                <div class="tb-cn tb-cn-shopping-cart">
                    <table class="tb tb-cart">
                        <thead class="tb__head">
                            <tr>
                                <th>Id Barang</th>
                                <th>Nama barang</th>
                                <th>Quantity</th>
                                <th>Harga barang</th>
                                <th>Discount</th>
                            </tr>
                        </thead>
                        <tbody class="tb__body">
                       
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="form-cn form-cn-add-to-cart">
                    <form action="" class="form">
                        <div class="form__elemen">
                            <label class="form__label" for="username">Nama Barang</label><br>
                            <input class="form__input" type="text" name="inputNamaBarang" id="inputNamaBarang" required>
                        </div>
                        <div class="form__elemen">
                            <label class="form__label" for="username">Quantity</label><br>
                            <input class="form__input" type="text" name="inputHargaBarang" id="inputHargaBarang" required>
                        </div>
                        <div class="form__elemen">
                            <input class="form__submit" type="submit" name="inputJudul" id="inputJudul" value="Add to chart"> <!--! from index-->
                        </div>
                    </form>
                </div>

                <div class="payment-info">
                    <ul class="li-items">
                        <li class="li-item li-item-subtotal">
                            <p class="li-item__text">Subtotal</p>
                            <p class="li-item__nom-subtotal">Rp.0</p>
                        </li>
                        <li class="li-item li-item-disc">
                            <p class="li-item__text">Discount</p>
                            <p class="li-item__nom-discount">Rp.0</p>
                        </li>
                        <li class="li-item">
                            <p class="li-item__text">Nominal bayar</p>
                            <input style="width: 100px" type="number" name="inputNominalBayar" id="inputNominalBayar" value="0">
                        </li>
                        <li class="li-item li-item-total">
                            <p class="li-item__text">Total</p>
                            <p class="li-item__nom-total">Rp.0</p>
                        </li>
                        <li class="li-item li-item-kembalian">
                            <p class="li-item__text">Kembalian</p>
                            <p class="li-item__nom-kembalian">Rp.0</p>
                        </li>      
                    </ul>
                    <form action="/order" class="form" method="POST">
                        @csrf
                        <div class="form__elemen hidden">
                            <label class="form__label" for="username">Quantity</label><br>
                            <input class="form__input" type="number" name="inputQuantity" id="inputTotalQuantity" required>
                        </div>
                        <div class="form__elemen hidden">
                            <label class="form__label" for="username">Total</label><br>
                            <input class="form__input" type="number" name="inputTotal" id="inputTotal" required>
                        </div>
                        <button type="submit" class="form__submit form__submit-pay-info">Proceed</button>
                    </form>
                </div> 
            </div>

            <div class="list-goods hidden">
                <div class="tb-cn tb-cn-list-goods">
                    <h1 class="form__title"><span class="form__title--blue">Daftar</span> Barang</h1>
                    <table class="tb tb-barang">
                        <thead class="tb__head">
                            <tr>
                                <th>Id barang</th>
                                <th>Nama barang</th>
                                <th>Harga barang</th>
                                <th>Stok barang</th>
                                <th>Discount</th>
                            </tr>
                        </thead>
                        <tbody class="tb__body">
                            @for ($i = 0; $i < count($user->barangs->all()); $i++)
                                    @if ($i % 2 !== 0)
                                    <tr class="tb__row tb__row--even">
                                        <td class="tb__data">{{ $user->barangs[$i]->id }}</td>
                                        <td class="tb__data">{{ $user->barangs[$i]->nama_barang }}</td>
                                        <td class="tb__data">{{ $user->barangs[$i]->harga_barang }}</td>
                                        <td class="tb__data">{{ $user->barangs[$i]->stok }}</td>
                                        <td class="tb__data">{{ $user->barangs[$i]->discount }}</td>
                                    </tr>
                                    @else
                                    <tr class="tb__row tb__row--odd">
                                        <td class="tb__data">{{ $user->barangs[$i]->id }}</td>
                                        <td class="tb__data">{{ $user->barangs[$i]->nama_barang }}</td>
                                        <td class="tb__data">{{ $user->barangs[$i]->harga_barang }}</td>
                                        <td class="tb__data">{{ $user->barangs[$i]->stok }}</td>
                                        <td class="tb__data">{{ $user->barangs[$i]->discount }}</td>
                                    </tr>
                                    @endif                             
                                @endfor
                        </tbody>
                    </table>
                </div>

                <div class="form-cn-search">
                    <h1 class="form__title form__title-search">Cari Barang</h1>
                    <form class="form form-search" action="form" id="form">
                        <div class="form__elemen form__elemen-search">
                            <input class="form__input form__input-search" type="search" name="inputSearch" id="inputSearch" required>
                        </div>
                        <div class="form__elemen form__elemen-search">
                            <input class="form__submit form__submit-search" type="submit" name="inputJudul" id="inputJudul" value="Search">   
                        </div>
                    </form>
                </div>
                
                <div class="form-cn">
                    <form action="" class="form">
                        <div class="form__elemen">
                            <label class="form__label" for="username">Id Barang</label><br>
                            <input class="form__input" type="number" name="inputIdBarang" id="inputIdBarang" required>
                            <label class="form__error hidden" for="">Field tidak boleh kosong</label>
                        </div>
                        <div class="form__elemen">
                            <label class="form__label" for="username">Quantity</label><br>
                            <input class="form__input" type="number" name="inputQuantity" id="inputQuantity" required>
                            <label class="form__error hidden" for="">Field tidak boleh kosong</label>
                        </div>
                        <div class="form__elemen">
                            <input class="form__submit form__submit-add" type="button" name="inputJudul" id="inputJudul" value="Add to cart"> <!--! from index-->
                        </div>
                    </form>
            </div>
        </div>
        </div>


        <nav class="nav">
            <div class="nav__items">
                <nav class="nav__item">
                    <a href=""><img class="nav__icon" src="{{asset("assets/icons/order--fill.svg")}}" alt=""></a>
                </nav>
                <nav class="nav__item">
                    <a href="/cashierHistory"><img class="nav__icon" src="{{asset("assets/icons/history--outline.svg")}}" alt=""></a>
                </nav>
                <nav class="nav__item">
                    <a href="http://127.0.0.1:8000/"><img class="nav__icon" src="{{asset("assets/icons/logout--outline.svg")}}" alt=""></a>
                </nav>
            </div>
        </nav>

        <div class="alert-cn hidden alert-cn-barang">
            <div class="alert alert-session">
                <img class="alert__icn" src="assets/icons/error-circle-rounded-outline.svg" alt="">
                <p class="alert__message">{{ "Barang tidak ditemukan" }}</p>
                <button class="homepage__btn homepage__btn--primary alert__btn">OK</button>
            </div>
            <div class="overlay"></div>
        </div>
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
    <script type="module" src="/js/order.js"></script>
</body>
</html>