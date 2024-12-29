<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style type="text/css">
        .title {
            color: white;
            padding-top: 25px;
            font-size: 25px;
        }

        label 
        {
            display: inline-block;
            width: 200px;
        }

    </style>
</head>
<body>
    @include('admin.sidebar')
    <!-- partial -->
    @include('admin.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="container" align="center">
            <h1 class="title">This is Product</h1>
           <form  action="{{url('uploadproduct')}}" method="post" enctype="multipart/form-data">
             @csrf
            <div style="padding: 15px">
             <label>Product title</label>
             <input style="color:black;" type="text" name="title" placeholder="Enter product title" required="">        
        </div>
        <form>
        <div style="padding: 15px">
             <label>Price</label>
             <input style="color:black;"  type="number" name="price" placeholder="Give a price" required="">        
        </div>

        <div style="padding: 15px">
             <label>Description</label>
             <input style="color:black;" type="text" name="des" placeholder="Give a description" required="">        
        </div>

        <div style="padding: 15px">
             <label>Quantity</label>
             <input style="color:black;" type="text" name="Quantity" placeholder="product quantity" required="">        
        </div>

        <div style="padding: 15px">
             <input  type="file" name="file" >        
        </div>

        <div style="padding: 15px">
             <input style="color:black;" class="btn btn-success" type="submit" name="" >        
        </div>

     </form>
        </div>
    </div>
    <!-- partial -->
    @include('admin.script')
</body>
</html>