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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style type="text/css">
        .center {
            margin: auto;
            width: 70%;
            padding-top: 40px;

        }

        .table-head {
            background-color: rgb(56, 146, 174);
            padding: 10px 8px;
            text-align: center;
        }

        .table-data {
            text-align: center;
        }

        .order {
            margin-top: 20px;
            margin-block: 50px
        }
    </style>
</head>

<body>


    <div class="hero_area">
        @include('home.header')


        <div class="center">
            @if (session()->has('message'))
                <div class="alert alert-primary">
                    {{ session()->get('message') }}
                    <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true"
                      >X</button>
                </div>
            @endif

            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th class="table-head">Product Title</th>
                        <th class="table-head">Quantity</th>
                        <th class="table-head">Price</th>
                        <th class="table-head">Image</th>
                        <th class="table-head">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $totalprice = 0; ?>
                    @foreach ($cart as $crt)
                        <tr>
                            <td class="table-data">{{ $crt->producttitle }}</td>
                            <td class="table-data">{{ $crt->quantity }}</td>
                            <td class="table-data">${{ $crt->price }}</td>
                            <td class="table-data"><img style="width: 100px; height:100px"
                                    src="/product/{{ $crt->image }}" alt=""></td>
                            <td class="table-data"><a onclick="confirmation(event)"
                                    href="{{ url('removecart', $crt->id) }}" class="btn btn-danger"> Remove Cart</a></td>
                        </tr>
                        <?php $totalprice = $totalprice + $crt->price; ?>
                    @endforeach


                </tbody>
            </table>
            <div class="order">
                <h6>total preice = $<?= $totalprice ?> </h6>
            </div>
            <div class="order">
                <h1 style="font-size: 25px">Proced on order</h1>
                <a href="{{ url('cashondeliovery') }}" class="btn btn-danger">Cash On delivery</a>
                <a href="{{ url('stripe',$totalprice)}}"class="btn btn-danger">Online Payment</a>
            </div>
        </div>





        <!-- footer start -->


        <!-- footer end -->
        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

            </p>
        </div>

        <script>
            function confirmation(ev) {
              ev.preventDefault();
              var urlToRedirect = ev.currentTarget.getAttribute('href');
              console.log(urlToRedirect);
              swal({
                  title: "Are you sure to cancel this product",
                  text: "You will not be able to revert this!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((willCancel) => {
                  if (willCancel) {



                      window.location.href = urlToRedirect;

                  }


              });


          }
      </script>
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
