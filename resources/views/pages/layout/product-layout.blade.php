<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'All Products')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-light d-flex flex-column min-vh-100">


    <nav class="navbar navbar-light bg-light shadow-sm px-4">
        <div class="container-fluid d-flex align-items-center">
    
            <a class="navbar-brand fw-bold text-primary" href="/manage-products">
                <img src="/images/logo-online.jpg" style="height: 40%;width: 23%;">
            </a>
    
            <div class="ms-auto d-flex gap-2">
                <a href="/admin/cart"
                   class="btn btn-outline-success d-flex align-items-center gap-1">
                    <i class="bi bi-cart-check"></i>
                    <span class="d-none d-md-inline">Cart Items</span>
                </a>
                <button class="btn btn-primary d-flex align-items-center gap-1 add-product">
                    <i class="bi bi-plus-circle"></i>
                    <span class="d-none d-md-inline">Add Product</span>
                </button>
    
            </div>
        </div>
    </nav>
    
    <main class="flex-fill">
        <div class="container mt-4">
            @yield('content')
        </div>
    </main>
    
    <footer class="bg-light border-top py-3 mt-auto">
        <div class="container text-center text-muted small">
            © {{ date('Y') }} MyShop. All rights reserved.
        </div>
    </footer>
    

    {{-- include files --}}
    @include('pages.products.models.add-product');
    @include('pages.products.models.edit-product');
    @include('pages.products.scripts.product-script');
    {{-- include files --}}

    {{-- script --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- script --}}
</body>
</html>
