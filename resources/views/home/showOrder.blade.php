<!DOCTYPE html>
<html>

<head>
<!-- Basic -->
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<!-- Site Metas -->
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="author" content="" />
<link rel="shortcut icon" href="images/favicon.png" type="">
<title>Famms - Fashion HTML Template</title>
<!-- bootstrap core css -->
<link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
<!-- font awesome style -->
<link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
<!-- responsive style -->
<link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
    <style>
        .order-show{
            min-height: 300px;
        }
        .show-order-table {
            width: 90%;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            margin-top: 30px;
            margin-bottom: 30px;
            padding: 10px;
        }
        .show-order-table th{
            background-color:rgba(128, 128, 128, 0.678);
        }
        .show-order-table td{
            padding: 7px;
        }
        .show-order-table th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('home.header')


        <div class="order-show">



            <table class="show-order-table">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Cancel Order</th>
                </tr>
                @foreach ($order as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->producttitle }}</td>
                        <td>$ {{ $item->price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->paymentstatus }}</td>
                        <td>{{ $item->deliverystatus }}</td>
                        @if ($item->deliverystatus =="Complete")
                        <td>Order Completed</td>
                       @else
                       <td><a href="{{url('cancelorder',$item->id )}}" class="btn btn-danger">Cancel Order</a></td>
                        @endif


                    </tr>
                @endforeach


            </table>
        </div>












        <!-- footer start -->
        @include('home.footer')

        <!-- footer end -->
        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

            </p>
        </div>
       <!-- jQery -->
      <script src="{{asset('home/js/jquery-3.4.1.min.js')}}"></script>
      <!-- popper js -->
      <script src="{{asset('home/js/popper.min.js')}}"></script>
      <!-- bootstrap js -->
      <script src="{{asset('home/js/bootstrap.js')}}"></script>
      <!-- custom js -->
      <script src="{{asset('home/js/custom.js')}}"></script>
</body>

</html>
