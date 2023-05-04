<section class="product_section layout_padding">
    <div class="container">
      
       <div class="row">
        @foreach ($product as $pr )
        <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{url('productdetails',$pr->id)}}" class="option1">
                   Product Details
                     </a>
                     <form action="{{url('addcart',$pr->id)}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4"><input type="number" style="width:60px;height:50px" name="quantity" min="1" value="1" ></div>
                            <div class="col-md-4"> <input  type="submit" value="Add To Cart"></div>
                        </div>




                     </form>

                  </div>
               </div>
               <div class="img-box">
                  <img src="product/{{$pr->image}}" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                    {{$pr->title}}
                  </h5>

                  @if($pr->discountprice !=null)
                  <h6 style="color:rgb(255, 32, 32)">

                    ${{$pr->discountprice}}

                  </h6>
                  <h6 style="text-decoration:line-through;color:blue">
                   Price
                   <br>
                    ${{$pr->price}}
                  </h6>


                  @else
                  <h6>
                    Price
                    <br>
                    ${{$pr->price}}
                  </h6>

                  @endif
               </div>
            </div>
         </div>

        @endforeach

<span style="padding-top: 20px">
    {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
</span>







       </div>
       <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div>
    </div>
 </section>
