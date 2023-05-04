<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .catagory_center {
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

        .centertable {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;

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
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button> --}}

                    </div>
                @endif
                <div class="catagory_center">
                    <h2 class="h2_font">Add Catagory</h2>
                    <form method="POST" action="{{ url('/add_catagory') }}">
                        @csrf
                        <input type="text" class="inputcolor" name="catagory" placeholder="Type Catagory">
                        <input type="submit" class="btn btn-primary" name="submit" value="Add Catagory">
                    </form>
                </div>
                <table class="centertable table-bordered">
                    <thead>



                        <tr>

                            <th scope="col">Catagory Name</th>
                            <th scope="col">Action</th>

                        </tr>


                    </thead>
                    <tbody>
                        @foreach ( $data as $data )

                        <tr>
                            <th >{{$data->catagory_name}}</th>
                            <td><a onclick="return confirm('are you sure to delte this catagory')" class="btn btn-primary" href="{{url('deletecatagory',$data->id)}}" >Delete</a></td>

                        </tr>
                        @endforeach
                    </tbody>
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
