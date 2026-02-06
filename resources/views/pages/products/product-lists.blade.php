@extends('pages.layout.product-layout')

@section('title', 'Products')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-white fw-bold">
        All Products
    </div>

    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Sr.No</th>
                    <th>Products</th>
                    <th>Price</th>
                    <th>Images</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td>₹ {{ number_format($product->price, 2) }}</td>
                    <td>
                        @foreach($product->images as $image)
                            <img src="{{ asset('storage/'.$image->image_path) }}" width="50" class="me-1 mb-1">
                        @endforeach
                    </td>
                    <td class="text-end">
                        <button data-id="{{ $product->id }}" class="btn btn-sm btn-warning edit-product">Edit</button>

                        <button class="btn btn-sm btn-danger delete-product"
                                data-id="{{ $product->id }}">
                            Delete
                        </button>
                
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">
                        No products found
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
