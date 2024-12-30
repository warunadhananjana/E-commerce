<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    @include('admin.css')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #111827;
            min-height: 100vh;
        }

        .container-scroller {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        .page-body-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .main-panel {
            flex: 1;
            background-color: #111827;
            min-height: calc(100vh - 60px); /* Adjust based on navbar height */
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .content-wrapper {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container-custom {
            background: rgba(30, 32, 35, 0.95);
            min-height: calc(100vh - 100px);
            width: calc(100% - 40px);
            margin: 20px;
            border-radius: 20px;
            padding: 2rem;
            color: #ffffff;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        .title {
            color: #00d2ff;
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            font-weight: 600;
            margin-bottom: 2rem;
            text-align: center;
            letter-spacing: 1px;
        }

        .form-group {
            margin-bottom: 1.5rem;
            width: 100%;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        label {
            display: block;
            margin-bottom: 0.75rem;
            font-size: clamp(0.9rem, 2vw, 1rem);
            color: #94a3b8;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: clamp(0.8rem, 2vw, 1rem);
            font-size: clamp(0.9rem, 2vw, 1rem);
            background-color: rgba(17, 24, 39, 0.7);
            border: 1px solid rgba(75, 85, 99, 0.4);
            border-radius: 10px;
            color: #ffffff;
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #00d2ff;
            box-shadow: 0 0 0 2px rgba(0, 210, 255, 0.2);
        }

        .file-upload {
            background-color: rgba(17, 24, 39, 0.7);
            border: 2px dashed rgba(75, 85, 99, 0.4);
            border-radius: 10px;
            padding: clamp(1rem, 3vw, 2rem);
            text-align: center;
            cursor: pointer;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }

        .file-upload:hover {
            border-color: #00d2ff;
        }

        .choose-file-btn {
            background: #00d2ff;
            color: #111827;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: clamp(0.9rem, 2vw, 1rem);
        }

        .choose-file-btn:hover {
            background: #00b8e6;
        }

        .file-name {
            color: #94a3b8;
            margin-top: 1rem;
            font-size: clamp(0.8rem, 2vw, 0.9rem);
        }

        .submit-btn {
            background: linear-gradient(45deg, #00d2ff, #3a7bd5);
            color: white;
            padding: clamp(0.8rem, 2vw, 1rem) clamp(1.5rem, 3vw, 2rem);
            border-radius: 8px;
            border: none;
            font-weight: 600;
            font-size: clamp(0.9rem, 2vw, 1rem);
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            width: 100%;
            max-width: 200px;
            margin: 0 auto;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3);
        }

        .alert {
            padding: 1rem;
            margin-bottom: 2rem;
            border-radius: 10px;
            background-color: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.2);
            color: #10b981;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .close {
            background: none;
            border: none;
            color: currentColor;
            font-size: 1.25rem;
            cursor: pointer;
        }

        form {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        @media (max-width: 768px) {
            .container-custom {
                padding: 1rem;
                margin: 10px;
                min-height: calc(100vh - 80px);
            }

            .form-group {
                margin-bottom: 1rem;
            }

            .file-upload {
                padding: 1rem;
            }

            .submit-btn {
                max-width: 100%;
            }
        }

        @media (max-width: 480px) {
            .container-custom {
                margin: 5px;
                padding: 0.8rem;
            }

            .title {
                margin-bottom: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        @include('admin.sidebar')

        <div class="container-fluid page-body-wrapper">
            @include('admin.navbar')

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="container-custom">
                        <h1 class="title">PRODUCT MANAGEMENT</h1>

                        @if(session()->has('message'))
                        <div class="alert">
                            <span>{{ session()->get('message') }}</span>
                            <button type="button" class="close" onclick="this.parentElement.style.display='none'">×</button>
                        </div>
                        @endif

                        <form action="{{ url('uploadproduct') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Product Title</label>
                                <input type="text" id="title" name="title" placeholder="Enter product title" required>
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" id="price" name="price" placeholder="Enter product price" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" id="description" name="des" placeholder="Enter product description" required>
                            </div>

                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" id="quantity" name="quantity" placeholder="Enter product quantity" required>
                            </div>

                            <div class="form-group">
                                <label>Product Image</label>
                                <div class="file-upload">
                                    <input type="file" id="image" name="file" hidden accept="image/*" required>
                                    <button type="button" class="choose-file-btn" onclick="document.getElementById('image').click()">Choose File</button>
                                    <div class="file-name">No file chosen</div>
                                </div>
                            </div>

                            <div style="text-align: center; width: 100%;">
                                <button type="submit" class="submit-btn">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.script')

    <script>
        document.getElementById('image').addEventListener('change', function () {
            document.querySelector('.file-name').textContent = this.files[0] ? this.files[0].name : 'No file chosen';
        });
    </script>
</body>
</html>