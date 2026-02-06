<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<nav class="navbar navbar-light bg-white shadow-sm px-4">
    <a class="navbar-brand fw-bold" href="/products">
        <img src="/images/logo-online.jpg" style="height:40px">
    </a>
</nav>

<div class="container py-4">
    <h4 class="mb-4">Shopping Cart</h4>

    @if($cart && $cart->items->count())
        <div class="row">
            @php $grandTotal = 0; @endphp

            @foreach($cart->items as $item)
                @php
                    $total = $item->product->price * $item->quantity;
                    $grandTotal += $total;
                @endphp

                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="row g-0 align-items-center">

                            <div class="col-4">
                                <img src="{{ asset('storage/'.$item->product->images->first()->image_path) }}"
                                     class="img-fluid rounded-start"
                                     style="height:120px; object-fit:cover;">
                            </div>

                            <div class="col-8">
                                <div class="card-body">
                                    <h6 class="mb-1">{{ $item->product->name }}</h6>
                                    <p class="mb-1 text-muted">
                                        Price: ₹ {{ number_format($item->product->price,2) }}
                                    </p>
                                    <p class="mb-1">
                                        Quantity: <strong>{{ $item->quantity }}</strong>
                                    </p>
                                    <p class="fw-semibold mb-0">
                                        Total: ₹ {{ number_format($total,2) }}
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="card mt-4 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Grand Total</h5>
                <h5 class="mb-0 text-primary">
                    ₹ {{ number_format($grandTotal,2) }}
                </h5>
            </div>
        </div>
    @else
        <div class="alert alert-info">
            Your cart is empty.
        </div>
    @endif
</div>

<footer class="bg-white border-top py-3 mt-auto">
    <div class="container text-center text-muted small">
        © {{ date('Y') }} MyShop. All rights reserved.
    </div>
</footer>

</body>
</html>
