<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset("css/index.css")}}">
    <link rel="stylesheet" href="{{asset("css/history.css")}}">
    <link rel="shortcut icon" type="image/svg" href="/assets/icons/succes.svg">
    <title>Cashierqu</title>
    <title>Document</title>
</head>
<body>
    <h1 class="title"><span class="title--blue">History</span> Pembelian</h1>
    <div class="container">
        <div class="tb-cn">
            <table class="tb">
                <thead class="tb__head">
                    <tr>
                        <th>Id transaksi</th>
                        <th>Id kasir</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody class="tb__body">
                    @for ($i = 0; $i < count($user->transaksis); $i++)
                        @if ($i % 2 !== 0)
                            <tr class="tb__row tb__row--even">
                                <td class="tb__data">{{ $user->transaksis[$i]->id }}</td>
                                <td class="tb__data">{{ $user->transaksis[$i]->id_kasir }}</td>
                                <td class="tb__data">{{ $user->transaksis[$i]->quantity }}</td>
                                <td class="tb__data">{{ $user->transaksis[$i]->total }}</td>
                                <td class="tb__data">{{ $user->transaksis[$i]->created_at->format("d-m-Y") }}</td>
                            </tr>
                            @else
                            <tr class="tb__row tb__row--odd">
                                <td class="tb__data">{{ $user->transaksis[$i]->id }}</td>
                                <td class="tb__data">{{ $user->transaksis[$i]->id_kasir }}</td>
                                <td class="tb__data">{{ $user->transaksis[$i]->quantity }}</td>
                                <td class="tb__data">{{ $user->transaksis[$i]->total }}</td>
                                <td class="tb__data">{{ $user->transaksis[$i]->created_at->format("d-m-Y") }}</td>
                            </tr>
                        @endif                             
                @endfor
                </tbody>
            </table>
        </div>
        <nav class="nav">
            <div class="nav__items">
                <nav class="nav__item">
                    <a href="http://127.0.0.1:8000/goods"><img class="nav__icon" src="{{asset("assets/icons/goods--outline.svg")}}" alt=""></a>
                </nav>
                <nav class="nav__item">
                    <a href=""><img class="nav__icon" src="{{asset("assets/icons/history--fill.svg")}}" alt=""></a>
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
    
</body>
</html>