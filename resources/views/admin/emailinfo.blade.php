<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        label{
            display: inline-block;
            width: 200px;
            font-size: 15px;
            font-weight: bold;
        }
        input{
            color: black;
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
                <h3 style="text-align:center;font-size: 25px;
                color:white">Send Email To {{$order->email}}</h3>
                <form action="{{url('senduseremail',$order->id)}}" method="POST">
                    @csrf
                    <div class="" style="padding-left: 35%;padding-top:30px">
                        <label for="">Email Greetings</label>
                    <input  style="color: black" type="text" name="greeting" id="">
                    </div>
                    <div class="" style="padding-left: 35%;padding-top:30px">
                        <label for="">Email First Line</label>
                    <input style="color: black" type="text" name="firsline" id="">
                    </div>
                    <div class="" style="padding-left: 35%;padding-top:30px">
                        <label for="">Email Body</label>
                    <input style="color: black" type="text" name="body" id="">
                    </div>
                    <div class="" style="padding-left: 35%;padding-top:30px">
                        <label for="">Email Button Name</label>
                    <input style="color: black" type="text" name="button" id="">
                    </div>
                    <div class="" style="padding-left: 35%;padding-top:30px">
                        <label for="">Email Url</label>
                    <input style="color: black" type="text" name="url" id="">
                    </div>
                    <div class="" style="padding-left: 35%;padding-top:30px">
                        <label for="">Email Lastline</label>
                    <input style="color: black"  type="text" name="lastline" id="">
                    </div>
                    <div class="" style="padding-left: 35%;padding-top:30px">

                    <input style="text-align: center" type="submit" value="Send Email">
                    </div>
                </form>
            </div>
            </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
@include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
