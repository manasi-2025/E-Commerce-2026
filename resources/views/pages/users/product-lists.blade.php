<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shop Products</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<style>
    .bg-color{
        background-color: rgb(100 111 147);
    }
    .btn-outline-secondary {
    --bs-btn-color: #ffff;
    --bs-btn-border-color: #212529;
    }
</style>
<body class="bg-light d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg navbar-light bg-color shadow-sm px-4">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="/products">
            <img src="/images/logo-online.jpg" style="height:30% ; width:30%;">
        </a>

        <div class="ms-auto">
            <a href="/cart" class="btn btn-outline-secondary position-relative">
                <i class="bi bi-cart3"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ session('cart_count', 0) }}
                </span>
            </a>
        </div>
    </div>
</nav>
@if(session('success'))
    <div class="container mt-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
@endif

<main class="flex-fill">
    <div class="container py-4">
        <h4 class="mb-4">Shop Products</h4>

        <div class="row">
            @forelse($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm">

                        <a href="{{ url('/product/'.$product->id.'/'.Str::slug($product->name)) }}">
                            <img src="{{ asset('storage/'.$product->images->first()->image_path) }}"
                                class="card-img-top"
                                style="height:200px; object-fit:cover;">
                        </a>

                        <div class="card-body text-center">
                            <h6 class="mb-1">{{ $product->name }}</h6>
                            <p class="fw-semibold mb-2">₹ {{ number_format($product->price,2) }}</p>

                            <form method="POST" action="{{ url('/cart/add') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button class="btn btn-sm btn-primary w-100">
                                    Add to Cart
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">
                    No products available
                </div>
            @endforelse
        </div>
    </div>
</main>

<footer class="bg-color border-top py-3 mt-auto">
    <div class="container text-center text-muted small ">
        © {{ date('Y') }} MyShop. All rights reserved.
    </div>
</footer>

</body>
</html>
