<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sixteen Clothing - Shopping Cart">
    <meta name="author" content="">
    <title>Sixteen Clothing - Cart</title>

    <!-- External CSS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <style>
        
        .alert {
    position: fixed;
    top: 85px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 1050;
    min-width: 300px;
    max-width: 80%;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    padding: 20px;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
    transition: opacity 0.5s ease-out; /* Add this for fade-out effect */
}

.alert-success {
    border-left: 4px solid #28a745;
}

.alert.fade-out {
    opacity: 0;
}

        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
        }

        /* Header Styles */
        header {
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            background-color: #fff;
            transition: all 0.3s ease-in-out;
        }
        

        .navbar {
            padding: 15px 0;
            background-color: #232323 !important;
        }

        .navbar-brand h2 {
            font-size: 24px;
            margin: 0;
            color: #fff;
        }

        .navbar-brand em {
            color: #f33f3f;
            font-style: normal;
        }

        .nav-link {
            color: #fff !important;
            font-weight: 500;
            padding: 10px 15px !important;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #f33f3f !important;
        }

        .navbar-toggler {
            border-color: #fff;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,255,255, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
        }

        /* Cart Section Styles */
        .cart-section {
            padding: 120px 20px 40px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        .cart-container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .cart-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .cart-table th {
            background-color: #f33f3f;
            color: white;
            padding: 15px;
            font-size: 16px;
            font-weight: 500;
            text-align: left;
        }

        .cart-table td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            font-size: 15px;
            color: #1a1a1a;
            vertical-align: middle;
        }

        .product-name {
            font-weight: 500;
            color: #1a1a1a;
        }

        .quantity {
            color: #f33f3f;
            font-weight: 500;
        }

        .price {
            font-weight: 600;
            color: #1a1a1a;
        }

        .cart-empty {
            padding: 40px;
            text-align: center;
            color: #666;
        }

        .continue-shopping {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background-color: #f33f3f;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            font-weight: 500;
        }

        .continue-shopping:hover {
            background-color: #d32f2f;
            color: white;
            text-decoration: none;
        }

        /* Mobile Responsive Styles */
        @media screen and (max-width: 768px) {
            .navbar-brand h2 {
                font-size: 20px;
            }

            .cart-section {
                padding: 100px 15px 30px;
            }

            .cart-container {
                border-radius: 10px;
                margin: 0 10px;
            }

            .cart-table {
                display: block;
            }

            .cart-table thead {
                display: none;
            }

            .cart-table tbody,
            .cart-table tr,
            .cart-table td {
                display: block;
                width: 100%;
            }

            .cart-table tr {
                margin-bottom: 15px;
                border-bottom: 2px solid #f2f2f2;
                padding: 15px;
            }

            .cart-table tr:last-child {
                margin-bottom: 0;
                border-bottom: none;
            }

            .cart-table td {
                text-align: right;
                padding: 10px 0;
                border-bottom: 1px solid #eee;
                position: relative;
            }

            .cart-table td:last-child {
                border-bottom: none;
            }

            .cart-table td::before {
                content: attr(data-label);
                float: left;
                font-weight: 500;
                color: #1a1a1a;
            }

            .quantity,
            .price {
                text-align: right;
            }
        }

        @media screen and (max-width: 480px) {
            .cart-section {
                padding-top: 80px;
            }

            .cart-container {
                margin: 0;
                border-radius: 0;
            }

            .cart-empty h3 {
                font-size: 18px;
            }

            .continue-shopping {
                padding: 10px 20px;
                font-size: 14px;
            }

            .navbar {
                padding: 10px 0;
            }
        }

        /* Preloader */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: white;
            z-index: 9999;
        }

        .jumper {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  

    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html"><h2>Sixteen <em>Clothing</em></h2></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Home</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="products.html">Our Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('login'))
                                @auth
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{url('showcart')}}">
                                            <i class="fa-solid fa-cart-shopping" style="color: #63E6BE; margin-right: 8px;"></i>Cart[{{$count}}]
                                        </a>
                                    </li>
                                    <x-app-layout>
                                    </x-app-layout>
                                @else
                                    <li><a class="nav-link" href="{{ route('login') }}">Log in</a></li>
                                    @if (Route::has('register'))
                                        <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                                    @endif
                                @endauth
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @if(session()->has('message'))
    <div id="delete-success-alert" class="alert alert-success">
        <div class="circle-animation">
            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none" />
                <path class="checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
            </svg>
        </div>
        <span class="alert-text">{{ session()->get('message') }}</span>
    </div>
    <script>
        // Ensure the script runs after the DOM has fully loaded
        document.addEventListener('DOMContentLoaded', function () {
            const alert = document.getElementById('delete-success-alert');
            if (alert) {
                // Wait 5 seconds before fading out the message
                setTimeout(() => {
                    alert.style.transition = 'opacity 0.5s ease-out';
                    alert.style.opacity = '0'; // Fade out effect
                    setTimeout(() => {
                        alert.remove(); 
                    }, 500); // Wait for the fade-out transition to complete
                }, 5000); // 5 seconds delay before fade-out
            }
        });
    </script>
@endif

    </header>

    <!-- Cart Section -->
    <section class="cart-section">
        <div class="cart-container">
            @if(isset($cart) && count($cart) > 0)
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{url('order')}}" method="post">
                            @csrf
                        @foreach($cart as $carts)
                        <tr>
                            <td data-label="Product Name" class="product-name"> 
                            <input type="text" name="productname[]" value="{{$carts->product_id}}" hidden="">
                                {{$carts->product_title}}</td>
                            <td data-label="Quantity" class="quantity">
                            <input type="number" name="quantity[]" value="{{$carts->quantity}}" hidden="">
                            {{$carts->quantity}}</td>
                            <td data-label="Price" class="price">
                            <input type="text" name="price[]" value="{{$carts->price}}" hidden="">
                                {{$carts->price}}</td>
                            <td data-label="Price" class="price"><a class="btn btn-danger" href="{{url('delete',$carts->id)}}">Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center mt-4">
    <button class="btn btn-success" id="confirm-order-button">
        <i class="fas fa-check-circle" style="margin-right: 5px;"></i>Confirm Order
    </button>
</div>

                </form>
            @else
                <div class="cart-empty">
                    <h3>Your cart is empty</h3>
                    <a href="products.html" class="continue-shopping">Continue Shopping</a>
                </div>
            @endif
        </div>
    </section>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        
        // Preloader
        $(window).on('load', function() {
            if($('#preloader').length) {
                $('#preloader').delay(100).fadeOut('slow', function() {
                    $(this).remove();
                });
            }
        });
    </script>
</body>
</html>