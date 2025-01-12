<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latest Products</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Alert Styles */
        .alert {
            position: relative;
            padding: 15px 20px;
            margin: 10px 0;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: #f8d7da;
            color: #721c24;
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
            color: #d63333;
        }

        /* Product Grid Styles */
        .latest-products {
            padding: 40px 0;
            background-color: #f8f9fa;
        }

        .section-heading {
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .section-heading h2 {
            margin: 0;
            font-size: 28px;
            color: #333;
        }

        .section-heading a {
            color: #007bff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .search-form {
            margin-top: 20px;
            width: 100%;
        }

        /* Product Grid Layout */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            padding: 20px 0;
        }

        /* Product Card Styles */
        .product-item {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            height: 600px;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease;
        }

        .product-item:hover {
            transform: translateY(-5px);
        }

        .product-item img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-bottom: 1px solid #eee;
        }

        .down-content {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .down-content h4 {
            margin: 0 0 10px 0;
            font-size: 20px;
            color: #333;
        }

        .down-content h6 {
            color: #007bff;
            font-size: 18px;
            margin-bottom: 15px;
        }

        .down-content p {
            color: #666;
            margin-bottom: 20px;
            flex: 1;
            overflow-y: auto;
        }

        /* Form Styles */
        .quantity-input {
            width: 100px !important;
            margin-bottom: 15px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .add-to-cart-btn {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .add-to-cart-btn:hover {
            background: #0056b3;
        }

        /* Pagination Styles */
        .pagination-container {
            margin-top: 40px;
            display: flex;
            justify-content: center;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .section-heading {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .search-form {
                flex-direction: column;
            }

            .search-form input {
                margin-bottom: 10px;
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
            <!-- Section Header -->
            <div class="section-heading">
                <h2>Latest Products</h2>
                <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
                
                <!-- Search Form -->
                <form action="{{ url('search') }}" method="get" class="search-form d-flex gap-2">
                    @csrf
                    <input
                        class="form-control"
                        type="search"
                        name="search"
                        placeholder="Search"
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
                        
                        <form action="{{ url('addcard', $product->id) }}" method="POST">
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