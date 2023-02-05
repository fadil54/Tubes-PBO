{{-- {{ dd(Auth::user()->role) }} --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset("/css/index.css")}}">
    <link rel="stylesheet" href="{{asset("/css/form.css")}}">
    <link rel="stylesheet" href="{{asset("/css/goods.css")}}">
    <link rel="shortcut icon" type="image/svg" href="/assets/icons/succes.svg">
    <title>Cashierqu</title>
</head>
<body>
    <main>
        <div class="container">
            <div class="col-2">
                <div class="form-cn">
                    <h1 class="form__title"><span class="form__title--blue">Input</span> Barang</h1>
                    <form class="form" action="/goods" id="form" method="POST">
                        @csrf
                        <div class="form__elemen">
                            <label class="form__label" for="inputNamaBarang">Nama Barang</label><br>
                            <input class="form__input" type="text" name="inputNamaBarang" id="inputNamaBarang" required>
                        </div>
                        <div class="form__elemen">
                            <label class="form__label" for="inputHargaBarang">Harga Barang</label><br>
                            <input class="form__input" type="number" name="inputHargaBarang" id="inputHargaBarang" required>
                        </div>
                        <div class="form__elemen">
                            <label class="form__label" for="inputStokBarang">Stok Barang</label><br>
                            <input class="form__input" type="number" name="inputStokBarang" id="inputStokBarang" required>
                        </div>
                        <div class="form__elemen">
                            <label class="form__label" for="inputStokBarang">Discount</label><br>
                            <input class="form__input" type="number" name="inputDiscount" id="inputDiscount" required>
                        </div>
                        <div class="form__elemen">
                            <a href="#signIn"><input class="form__submit" type="submit" name="inputJudul" id="inputJudul" value="Add"></a> <!--! from index-->
                        </div>
                    </form>
                </div>
                
                <div class="list-goods">
                    <div class="tb-cn">
                        <h1 class="form__title"><span class="form__title--blue">Daftar</span> Barang</h1>
                        <table class="tb">
                            <thead class="tb__head">
                                <tr>
                                    <th>Id barang</th>
                                    <th>Nama barang</th>
                                    <th>Harga barang</th>
                                    <th>Stok barang</th>
                                    <th>Discount</th>
                                    <th>Actions</th>
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
                                        <td class="tb__data tb__data-actions">
                                            <img class="tb__icn tb__icn-edit" src="/assets/icons/edit.svg" alt="">
                                            <form class="form-delete" action="/goods-delete" method="POST">
                                                @csrf
                                                <div class="alert-cn hidden">
                                                    <div class="alert alert-confirm">
                                                        <img class="alert__icn" src="assets/icons/delete-forever-outline.svg" alt="">
                                                        <p class="alert__message">Are you sure?</p>
                                                        <button type="submit" class="homepage__btn homepage__btn--primary alert__btn alert__btn-yes">Yes</button>
                                                        <button type="button" class="homepage__btn homepage__btn--secondary alert__btn alert__btn-cancel">Cancel</button>
                                                    </div>
                                                </div>
                                                <input type="number" name="inputIdBarang" id="inputId" class="inputDeleteId hidden">
                                                <img class="tb__icn tb__icn-trash" src="/assets/icons/trash.svg" alt="">
                                                <div class="overlay hidden"></div>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                    @else
                                    <tr class="tb__row tb__row--odd">
                                        <td class="tb__data">{{ $user->barangs[$i]->id }}</td>
                                        <td class="tb__data">{{ $user->barangs[$i]->nama_barang }}</td>
                                        <td class="tb__data">{{ $user->barangs[$i]->harga_barang }}</td>
                                        <td class="tb__data">{{ $user->barangs[$i]->stok }}</td>
                                        <td class="tb__data">{{ $user->barangs[$i]->discount }}</td>
                                        <td class="tb__data tb__data-actions">
                                            <img class="tb__icn tb__icn-edit" src="/assets/icons/edit.svg" alt="">
                                            <form action="/goods-delete" method="POST">
                                                @csrf
                                                <div class="alert-cn hidden">
                                                    <div class="alert alert-confirm">
                                                        <img class="alert__icn" src="assets/icons/delete-forever-outline.svg" alt="">
                                                        <p class="alert__message">Are you sure?</p>
                                                        <button type="submit" class="homepage__btn homepage__btn--primary alert__btn alert__btn-yes">Yes</button>
                                                        <button type="button" class="homepage__btn homepage__btn--secondary alert__btn alert__btn-cancel">Cancel</button>
                                                    </div>
                                                </div>
                                                <input type="number" name="inputIdBarang" id="inputId" class="inputDeleteId hidden">
                                                <img class="tb__icn tb__icn-trash" src="/assets/icons/trash.svg" alt="">
                                                <div class="overlay hidden"></div>
                                            </form>
                                        </td>
                                    </tr>
                                    @endif
                                    
                                @endfor
                            </tbody>
                        </table>
                    </div>
    
                    <div class="form-cn-search">
                        <h1 class="form__title form__title-search"><span class="">Search</span> Barang</h1>
                        <form class="form form-search" action="form" id="form">
                            <div class="form__elemen form__elemen-search">
                                <input class="form__input form__input-search" type="search" name="inputSearch" id="inputSearch" required>
                            </div>
                            <div class="form__elemen form__elemen-search">
                                <input class="form__submit form__submit-search" type="submit" name="inputJudul" id="inputJudul" value="Search">   
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <nav class="nav">
                <div class="nav__items">
                    <nav class="nav__item">
                        <a href="#"><img class="nav__icon" src="{{asset("assets/icons/goods--fill.svg")}}" alt=""></a>
                    </nav>
                    {{-- <nav class="nav__item">
                        <a href="/order"><img class="nav__icon" src="{{asset("assets/icons/order--outline.svg")}}" alt=""></a>
                    </nav> --}}
                    <nav class="nav__item">
                        <a href="/companyHistory"><img class="nav__icon" src="{{asset("assets/icons/history--outline.svg")}}" alt=""></a>
                    </nav>
                    <nav class="nav__item">
                        <a href="http://127.0.0.1:8000/settings"><img class="nav__icon" src="{{asset("assets/icons/settings--outline.svg")}}" alt=""></a>
                    </nav>
                    <nav class="nav__item">
                        <a href="http://127.0.0.1:8000/"><img class="nav__icon" src="{{asset("assets/icons/logout--outline.svg")}}" alt=""></a>
                    </nav>
                </div>
            </nav>
        </div>
      

        <div class="form-cn form-cn-popup hidden">
            <form class="form form-popup" action="/goods-update" method="POST" id="form">
                @csrf
                <h1 class="form__title form__title-popup"><span class="form__title--blue">Edit</span> Barang <input type="number" name="inputIdBarang" class="form__input-popup-id hidden"></span></h1>
                <div class="form__elemen form__elemen-popup">
                    <label class="form__label" for="username">Nama Barang</label><br>
                    <input class="form__input form__input-popup form__input-popup-nama" type="text" name="inputNamaBarang" id="inputNamaBarang" required>
                </div>
                <div class="form__elemen form__elemen-popup">
                    <label class="form__label" for="username">Harga Barang</label><br>
                    <input class="form__input form-input-popup form__input-popup-harga" type="number" name="inputHargaBarang" id="inputHargaBarang" required>
                </div>
                <div class="form__elemen form__elemen-popup">
                    <label class="form__label" for="judul">Stok Barang</label><br>
                    <input class="form__input form-input-popup form__input-popup-stok" type="number" name="inputStokBarang" id="inputStokBarang" required>
                </div>
                <div class="form__elemen form__elemen-popup">
                    <label class="form__label" for="judul">Discount</label><br>
                    <input class="form__input form-input-popup form__input-popup-discount" type="number" name="inputDiscount" id="inputDiscount" required>
                </div>
                <div class="form__elemen form__elemen-popup">
                    <a href="#signIn"><input class="form__submit-popup" type="submit" name="inputJudul" id="inputJudul" value="Update"></a> <!--! from index-->
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
        
            {{-- <div class="overlay hidden"></div> --}}
    </main>
    <script type="module" src="/js/goods.js"></script>
</body>
</html>