<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .htag {
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            padding: 10px 0;
            color: red;
        }

        .vieworder {

            width: 100%;
            overflow-y:hidden;
            border: 1px solid white;
            border-collapse:collapse;
            padding-right: 5px;


        }
        .tble {

            width: 100%;
            overflow: inherit;
            border: 1px solid white;




        }

        .content-wrapper {
            background: rgba(117, 154, 175, 0.488);
        }

        #sds {

            background-color: rgb(5, 108, 204);

        }

        #thname {
            text-align: center;
            color: rgb(255, 255, 255);

        }

        .table-data {
            text-align: center;
            color: white;
            padding: 0 10px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">

        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="vieworder">
                    <h6 class="htag">All Order</h6>
                    <div class="" style="padding-left:400px;padding-bottom:30px">

                        <form action="{{url('search')}}" method="GET">
                            <input type="text" style="color: Black" name="search" placeholder="Search">
                            <input type="submit" value="Search" class="btn btn-outline-primary" id="">
                        </form>
                    </div>

                    <table  class="tble" >

                            <tr id="sds">

                                <th id="thname">Name</th>
                                <th id="thname">Email</th>
                                <th id="thname">Phone</th>
                                <th id="thname">Address</th>
                                <th id="thname">Product</th>
                                <th id="thname" >Quantity</th>
                                <th id="thname">Price</th>
                                <th id="thname">Payment Status</th>
                                <th id="thname">Delivery Status</th>
                                <th id="thname" style="width:150px">Image</th>
                                <th id="thname" >Delivered</th>
                                <th id="thname" >Print Pdf</th>
                                <th id="thname" >Send Email</th>
                            </tr>


                            @forelse ($order as $order)


                                <tr>
                                    <?php
                                    $count =0;
                                $count =$count+1
                                ?>

                                    <td class="table-data">{{ $order->name }}</td>
                                    <td class="table-data">{{ $order->email }}</td>
                                    <td class="table-data">{{ $order->phone }}</td>
                                    <td class="table-data">{{ $order->address }}</td>
                                    <td class="table-data">{{ $order->producttitle }}</td>
                                    <td class="table-data">{{ $order->quantity }}</td>
                                    <td class="table-data">{{ $order->price }}</td>
                                    <td class="table-data">{{ $order->paymentstatus }}</td>

                                    <td class="table-data">{{ $order->deliverystatus }}</td>

                                    <td><img style="" src="/product/{{ $order->image }}" alt=""></td>
                                    <td>
                                        @if($order->deliverystatus =='processing' )
                                        <a href="{{url('delivered',$order->id)}}" class="btn btn-warning" type="submit">Delivered</a>



                                    @else
                                    <p style="text-align: center;color:green;font-size:bold"> Delivered</p>

                                    @endif</td>
                                    <td><a href="{{url('printpdf',$order->id)}}" class="btn btn-success">Print Pdf</a></td>
                                    <td><a href="{{url('sendemail',$order->id)}}" class="btn btn-info">SendEmail</a></td>
                                </tr>
                                @empty
                                <tr>
                                    <td style="margin:auto;font-size:20px;color:red;font-weight:bold; margin-bottom:15px ">No Data Found</td>
                                </tr>

                                @endforelse


                    </table>
                </div>

            </div>
        </div>


        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>
