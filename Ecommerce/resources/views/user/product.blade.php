<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latest Products</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            line-height: 1.6;
        }

        /* Alert Styles */
        .alert {
            position: relative;
            padding: 15px 20px;
            margin: 10px 15px;
            border: 1px solid transparent;
            border-radius: 8px;
            background-color: #f8d7da;
            color: #721c24;
            font-size: clamp(14px, 2.5vw, 16px);
            line-height: 1.5;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .alert .close {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            font-size: clamp(16px, 3vw, 20px);
            font-weight: bold;
            line-height: 1;
            color: #0c4226;
            background: none;
            border: none;
            cursor: pointer;
            outline: none;
            transition: color 0.2s ease-in-out;
            padding: 5px;
            z-index: 2;
        }

        /* Product Grid Styles */
        .latest-products {
            padding: clamp(20px, 4vw, 40px) 0;
            background-color: #f8f9fa;
        }

        .container {
            padding: 0 clamp(15px, 3vw, 30px);
            max-width: 1400px;
            margin: 0 auto;
        }

        .section-heading {
            margin-bottom: clamp(20px, 4vw, 30px);
            padding: 0 clamp(10px, 2vw, 20px);
        }

        .section-heading h2 {
            font-size: clamp(24px, 4vw, 28px);
            color: #333;
            margin-bottom: clamp(15px, 3vw, 20px);
        }

        /* Search Form */
        .search-wrapper {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 20px;
        }

        @media (min-width: 768px) {
            .search-wrapper {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }
        }

        .search-form {
            display: flex;
            gap: 10px;
            width: 100%;
        }

        @media (min-width: 768px) {
            .search-form {
                width: auto;
                min-width: 300px;
            }
        }

        .search-form input {
            flex: 1;
            min-width: 0;
            padding: 8px 12px;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        .search-form button {
            white-space: nowrap;
            padding: 8px 20px;
        }

        /* Product Grid Layout */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(min(100%, 300px), 1fr));
            gap: clamp(15px, 3vw, 25px);
            padding: clamp(10px, 2vw, 20px);
        }

        /* Product Card Styles */
        .product-item {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            height: auto;
            min-height: 500px;
            max-height: 600px;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        @media (hover: hover) {
            .product-item:hover {
                transform: translateY(-5px);
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
            }
        }

        .product-item img {
            width: 100%;
            height: clamp(200px, 30vw, 300px);
            object-fit: cover;
            border-bottom: 1px solid #eee;
        }

        .down-content {
            padding: clamp(15px, 3vw, 20px);
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .down-content h4 {
            font-size: clamp(18px, 2.5vw, 20px);
            color: #333;
            margin-bottom: 5px;
        }

        .down-content h6 {
            color: #007bff;
            font-size: clamp(16px, 2.5vw, 18px);
        }

        .down-content p {
            color: #666;
            font-size: clamp(14px, 2vw, 16px);
            flex: 1;
            overflow-y: auto;
            margin-bottom: 10px;
            /* Scrollbar styling */
            scrollbar-width: thin;
            scrollbar-color: #888 #f1f1f1;
        }

        .down-content p::-webkit-scrollbar {
            width: 5px;
        }

        .down-content p::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .down-content p::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        /* Form Styles */
        .product-form {
            margin-top: auto;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .quantity-input {
            width: clamp(80px, 15vw, 100px) !important;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: clamp(14px, 2vw, 16px);
        }

        .add-to-cart-btn {
            width: 100%;
            padding: clamp(8px, 2vw, 12px);
            background: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s ease;
            font-size: clamp(14px, 2vw, 16px);
            font-weight: 500;
        }

        .add-to-cart-btn:hover {
            background: #0056b3;
        }

        /* Pagination Styles */
        .pagination-container {
            margin-top: clamp(20px, 4vw, 40px);
            padding: 0 clamp(10px, 2vw, 20px);
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 5px;
        }

        .pagination-container .pagination {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            justify-content: center;
        }

        .pagination-container .page-link {
            padding: clamp(6px, 1.5vw, 12px) clamp(10px, 2vw, 15px);
            font-size: clamp(14px, 2vw, 16px);
        }

        /* Touch Device Optimizations */
        @media (hover: none) {
            .add-to-cart-btn {
                padding: clamp(12px, 3vw, 16px);
            }

            .quantity-input {
                padding: 10px;
            }
        }

        /* Larger Screen Optimizations */
        @media (min-width: 1200px) {
            .container {
                padding: 0 40px;
            }

            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            }
        }

        /* Print Styles */
        @media print {
            .search-wrapper,
            .add-to-cart-btn,
            .quantity-input {
                display: none;
            }

            .product-item {
                break-inside: avoid;
                box-shadow: none;
                border: 1px solid #ddd;
            }
        }
    </style>
</head>
<body>
    <!-- Alert Message -->
    @if(session()->has('message'))
    <div class="alert">
        <span>{{ session()->get('message') }}</span>
        <button type="button" class="close" onclick="this.parentElement.style.display='none'">×</button>
    </div>
    @endif

    <!-- Latest Products Section -->
    <div class="latest-products">
        <div class="container">
            <!-- Section Header and Search -->
            <div class="search-wrapper">
                <div class="section-heading">
                    <h2>Latest Products</h2>
                </div>
                
                <!-- Search Form -->
                <form action="{{ url('search') }}" method="get" class="search-form">
                    @csrf
                    <input
                        type="search"
                        name="search"
                        placeholder="Search products..."
                        aria-label="Search"
                    />
                    <button type="submit" class="btn btn-success">Search</button>
                </form>
            </div>

            <!-- Products Grid -->
            <div class="products-grid">
                @foreach($data as $product)
                <div class="product-item">
                    <img src="/productimage/{{$product->image}}" alt="{{ $product->title }}">
                    <div class="down-content">
                        <h4>{{$product->title}}</h4>
                        <h6>${{$product->price}}</h6>
                        <p>{{$product->description}}</p>
                        
                        <form action="{{ url('addcard', $product->id) }}" method="POST" class="product-form">
                            @csrf
                            <input 
                                type="number" 
                                value="1" 
                                min="1" 
                                class="quantity-input"
                                name="quantity"
                            >
                            <input 
                                type="submit" 
                                class="add-to-cart-btn" 
                                value="Add to Cart"
                            >
                        </form>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if(method_exists($data, 'links'))
            <div class="pagination-container">
                {{$data->links()}}
            </div>
            @endif
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>