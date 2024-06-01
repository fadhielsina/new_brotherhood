<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Checkout example · Bootstrap v5.0</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('front')}}/bootstrap/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container">
        <main>
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="{{asset('front')}}/wp-content/uploads/2022/06/main-logo-bbb1mc.webp" alt="" width="130" height="150">
                <h2>Checkout form</h2>
            </div>

            <form method="POST" class="needs-validation" action="{{ url('merchant_submit_form') }}">
                @csrf
                <div class="row g-5">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">Your cart</span>
                        </h4>
                        <ul class="list-group mb-3">
                            @if(count($product) > 1)
                            <?php $total = $product['total']; ?>
                            <input type="text" id="total" name="total" value="{{$total}}" hidden>
                            @for($x = 0; $x < count($product['id']); $x++) <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">{{$product['name'][$x]}} ({{$product['qty'][$x]}})</h6>
                                    <small class="text-muted">{{$product['deskripsi'][$x]}}</small>
                                </div>
                                <span class="text-muted">{{$product['price'][$x]}}</span>
                                </li>
                                <input type="hidden" name="total_item" id="total_item" value="{{$x}}">
                                <input type="hidden" id="nama_produk[]" name="nama_produk[]" value="{{$product['name'][$x]}}">
                                <input type="hidden" id="deskripsi[]" name="deskripsi[]" value="{{$product['deskripsi'][$x]}}">
                                <input type="hidden" id="qty[]" name="qty[]" value="{{$product['qty'][$x]}}">
                                <input type="hidden" id="price[]" name="price[]" value="{{$product['price'][$x]}}">
                                @endfor
                                @else
                                <?php $total = 0; ?>
                                @endif
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Total (IDR)</span>
                                    <strong>Rp. {{$total}}</strong>
                                </li>
                        </ul>
                    </div>
                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Billing address</h4>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="" value="" required>
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">No Tlp / WA</label>
                                <input type="text" class="form-control" id="tlp" name="tlp" placeholder="" value="" required>
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="" value="" required>
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="" value="" required>
                            </div>

                        </div>

                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
            </form>
    </div>
    </div>
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017–2021 Company Name</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
    </div>


    <script src="{{asset('front')}}/bootstrap/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="form-validation.js"></script>
</body>

</html>