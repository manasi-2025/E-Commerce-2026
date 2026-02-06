@extends('pages.layout.product-layout')

@section('title', 'Products')

@section('content')


<div class="card shadow-sm">
    <div class="card-header bg-white fw-bold">
        Cart Items (User ID: 1)
    </div>

    <div class="card-body p-0">
        <table class="table table-bordered mb-0">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @if($cart && $cart->items->count())
                    @foreach($cart->items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->product->name }}</td>
                            <td>₹ {{ number_format($item->product->price,2) }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>
                                ₹ {{ number_format($item->product->price * $item->quantity,2) }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Cart is empty
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection
