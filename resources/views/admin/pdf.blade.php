<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<ul>
    <li>Name:{{ $order->name }}</li>
    <li>Email:{{ $order->email }}</li>
    <li>Phone:{{ $order->phone }}</li>
    <li>Address:{{ $order->address }}</li>
    <li>Product Name:{{ $order->producttitle }}</li>
    <li>Price:{{ $order->price }}</li>
    <li>Quantity:{{ $order->quantity }}</li>
    <li>Product Id:{{ $order->product_id}}</li>
    <li>Payment Status:{{ $order->paymentstatus }}</li>
    <li>Customer Id:{{ $order->user_id }}</li>
    <li><img src="product/{{ $order->image }}" style="width: 200px;height:200px" alt="{{ $order->image }}"></li>

</ul>
</body>
</html>
