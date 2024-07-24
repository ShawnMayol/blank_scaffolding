<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Checkout</h1>
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th>Picture</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price Each</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td><img src="{{ $item->product->prodImageURL }}" alt="" style="width: 50px; height: auto;"></td>
                        <td>{{ $item->product->prodName }}</td>
                        <td>{{ $item->cartQuantity }}</td>
                        <td>{{ $item->cartPriceEach }}</td>
                        <td>{{ $item->cartQuantity * $item->cartPriceEach }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3>Total: ₱{{ $totalAmount }}</h3>
        <button type="submit" class="btn btn-primary">Proceed to Checkout</button>
    </form>
</div>
</body>
</html>
