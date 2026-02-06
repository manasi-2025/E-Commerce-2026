<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $product->name }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .thumb-img {
            cursor: pointer;
            border: 1px solid #ddd;
            padding: 3px;
        }
        .thumb-img:hover {
            border-color: #0d6efd;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-light bg-light shadow-sm px-4">
    <a class="navbar-brand fw-bold" href="/products">
        <img src="/images/logo-online.jpg" style="height:40px">
    </a>
</nav>
@if(session('success'))
    <div class="container mt-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
@endif

<div class="container py-4">
    <div class="row">

        <div class="col-md-6">

            <img id="mainImage"
                 src="{{ asset('storage/'.$product->images->first()->image_path) }}"
                 class="img-fluid border mb-3"
                 style="max-height:400px; object-fit:contain; width:100%;">

            <div class="d-flex gap-2">
                @foreach($product->images as $image)
                    <img src="{{ asset('storage/'.$image->image_path) }}"
                         width="70"
                         class="thumb-img"
                         onclick="changeImage(this.src)">
                @endforeach
            </div>

        </div>
        
        <div class="col-md-6">
            <h3>{{ $product->name }}</h3>
            <h5 class="text-primary mb-3">
                ₹ {{ number_format($product->price,2) }}
            </h5>

            <form method="POST" action="{{ url('/cart/add') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="mb-3">
                    <label>Quantity</label>
                    <input type="number"
                           name="quantity"
                           value="1"
                           min="1"
                           class="form-control w-25">
                </div>

                <button class="btn btn-primary">
                    Add to Cart
                </button>
            </form>
        </div>

    </div>
</div>

<script>
    function changeImage(src) {
        document.getElementById('mainImage').src = src;
    }
</script>

</body>
</html>
