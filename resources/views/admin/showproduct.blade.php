<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .product_center {
            margin: auto;
            width: 80%;


        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
            text-align: center;
        }

        .inputcolor {
            color: black;
        }

        .imagesixe{
            width: 350px;
        }
        .tablehead{
            background-color: rgb(107, 127, 107);
            font-size: 19px;
            font-weight: 100;
            text-align: center;
        }
        .tablehead th{
            padding: 12px
        }
        tbody{
            text-align: center;
        }
        tbody tr td{

            padding: 17px;
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
                @if (session()->has('message'))

                <div class="alert alert-primary">
                    {{ session()->get('message') }}


                    <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true"
                        aria-label="Close">X</button>


                </div>
            @endif
                <h2 class="h2_font">All Product</h2>
                <table class=" product_center table-bordered">
                    <thead class="tablehead">
                      <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Catagory</th>
                        <th>Delete</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $p )


                      <tr>
                        <td >{{$p->title}}</td>
                        <td>{{$p->description}}</td>
                        <td>{{$p->price}}</td>
                        <td>{{$p->discountprice}}</td>
                        <td>{{$p->quantity}}</td>
                        <td><img class="imagesixe" src="product/{{$p->image}}" alt=""> </td>
                        <td>{{$p->catagory}}</td>
                        <td><a class="btn btn-danger" onclick="return confirm('are you sure delete products')"  href="{{url('product/delete',$p->id)}}">Delete</a></td>
                            <td>
                            <a class="btn btn-success" href="{{url('product/update',$p->id)}}">Update</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
@include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
