<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
     @include('admin.css')
  </head>
  <body>
       @include('admin.sidebar')
      <!-- partial -->
        @include('admin.navbar')
        <!-- partial -->
        <div style="padding-bottom:30px" class="container-fluid page-body-wrapper">
            <div class="container" align="center">
            
             <table>
               
             <tr style ="background-color: grey;">
               <td style="padding:20px;">Title</td>
               <td style="padding:20px;">Description</td>  
               <td style="padding:20px;">Quntity</td>  
               <td style="padding:20px;">Price</td>  
               <td style="padding:20px;">Image</td>      
            </tr>
              @foreach($data as $product)
            <tr align="center" style ="background-color: black; ">
               <td >{{$product->title}}</td>
               <td>{{$product->description}}</td>  
               <td>{{$product->quantity}}</td>  
               <td>{{$product->price}}</td>  
               <td>
                 <img src="/productimage/{{$product->image}}" style="width: 100px; height: 100px;">
               </td>      
            </tr>
             @endforeach
             </table>

            </div>
       </div>
          <!-- partial -->
         @include('admin.script')
  </body>
</html>