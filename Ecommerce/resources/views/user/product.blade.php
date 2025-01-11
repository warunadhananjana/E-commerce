<style>
.alert {
    position: relative;
    padding: 15px 20px;
    margin: 10px 0;
    border: 1px solid transparent;
    border-radius: 4px;
    background-color: #f8d7da; /* Light red background */
    color: #721c24; /* Dark red text */
    font-size: 16px;
    line-height: 1.5;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

.alert .close {
    position: absolute;
    top: 50%;
    right: 15px;
    transform: translateY(-50%);
    font-size: 20px;
    font-weight: bold;
    line-height: 1;
    color: #0c4226;
    background: none;
    border: none;
    cursor: pointer;
    outline: none;
    transition: color 0.2s ease-in-out;
}

.alert .close:hover {
    color: #d63333; /* Slightly darker red on hover */
}
</style>

@if(session()->has('message'))
                        <div class="alert">
                            <span>{{ session()->get('message') }}</span>
                            <button type="button" class="close" onclick="this.parentElement.style.display='none'">×</button>
                        </div>
                        @endif
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