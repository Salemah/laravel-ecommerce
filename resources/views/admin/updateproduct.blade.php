<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .addproduct_center {
            text-align: center;
            padding-top: 40px;

        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .inputcolor {
            color: black;
        }
        label{
            display: inline-block;
            width:200px;
        }

        .inputdesign {
            padding-bottom: 15px;

        }
    </style>
</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="addproduct_center">
                    @if (session()->has('message'))
                    <div class="alert alert-primary">
                        {{ session()->get('message') }}
                        <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true"
                            aria-label="Close">X</button>

                    </div>
                @endif
                    <h1 class="h2_font">Update products</h1>
                    <form action="{{url('/update_products',$data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                  <div class=" inputdesign">
                    <label>Product Title</label>
                    <input type="text" class="inputcolor" value="{{$data->title}}" name="title" placeholder="enter Product Title" required>
                  </div>

                  <div class="inputdesign">
                    <label>Product Description</label>
                    <input type="text" class="inputcolor" value="{{$data->description}}" name="description" placeholder="enter Product description" required>
                  </div>
                  <div class="inputdesign">
                    <label>Product Catagory</label>
                    <select class="inputcolor" name="catagory" required="" >
                        <option value="{{$data->catagory}}" selected>{{$data->catagory}}</option>
                        @foreach ($catagory as $ct )
                        <option value="{{$ct->catagory_name}}">{{$ct->catagory_name}}</option>

                        @endforeach

                      </select>
                  </div>
                  <div class="inputdesign">
                    <label>Product Quantity</label>
                    <input type="number" class="inputcolor" min="0" value="{{$data->quantity}}"name="quantity" placeholder="enter Product quantity" required>
                  </div>
                  <div class="inputdesign">
                    <label>Product Price</label>
                    <input type="number" class="inputcolor" value="{{$data->price}}" name="price" placeholder="enter Product price" required>
                  </div>
                  <div class="inputdesign">
                    <label>Product discountprice</label>
                    <input type="number" class="inputcolor" value="{{$data->discountprice}}" name="discountprice" placeholder="enter Product discountprice">
                  </div>
                  <div class=" inputdesign">
                    <label>Current Image</label>
                    <img style="margin: auto" height="100px" width="100px" src="/product/{{$data->image}}" alt="">
                  </div>
                  <div class=" inputdesign">
                    <label>Change Product Image</label>
                    <input type="file"  name="image"  >
                  </div>
                  <div class="inputdesign">
                  <input type="submit"  class="btn btn-primary" value="Add Product">
                  </div>
                </form>
                </div>
            </div>
        </div>

        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>
