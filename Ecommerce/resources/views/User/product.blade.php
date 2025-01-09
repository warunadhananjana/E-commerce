<div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
              <form action ="{{url('search')}}" method="get" class="form-inline d-flex justify-content-end p-2" style="gap: 10px;">
               @csrf
              <input  
                     class="form-control me-2"
                     type="search"
                     name="search"
                     placeholder="Search"
                     aria-label="Search"
                    style="flex: 1; min-width: 150px;"
            />
  <button type="submit" class="btn btn-success">Search</button>
</form>

            </div>
          </div>
          
           @foreach($data as $product)

          <div class="col-md-4">
            <div class="product-item">
              <a href="#"><img height="300" width="150" src="/productimage/{{$product-> image}}" alt=""></a>
              <h6>${{$product->price}}</h6>
              <div class="down-content">
                <a href="#"><h4>{{$product->title}}</></a>
                <h6>{{$product->price}}</h6>
                <p>{{$product->description}}</p>
               <form action="{{url('addcard',$product->id)}}" method="POST">
                @csrf
                
                <input type="number" value="1" min="1" class="form-control" 
                 style="width:100px" name="quantity"> 
                 <br>
                <input class="btn btn-primary" type="submit" value="Add card">
               </form>
              </div>
            </div>
          </div>
          @endforeach

          @if(method_exists($data,'links'))
          <div class= "d-flex justify-content-center">
            
           {{$data->links()}}    
        </div>
        @endif
        </div>
      </div>
    </div>