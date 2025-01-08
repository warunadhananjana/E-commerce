<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
      /* General Styles */
      body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fc;
        margin: 0;
        padding: 0;
      }

      .container {
        margin-top: 30px;
        max-width: 100%;
        padding: 20px;
      }

      .table-wrapper {
        width: 100%;
        overflow-x: auto;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      }

      table {
        width: 100%;
        border-collapse: collapse;
      }

      th, td {
        padding: 15px;
        text-align: center;
        font-size: 16px;
        color: #333;
        vertical-align: middle;
      }

      th {
        background-color: #007bff;
        color: white;
        text-transform: uppercase;
        font-size: 14px;
        text-align: center;
        vertical-align: middle;
      }

      tr:nth-child(even) {
        background-color: #f9f9f9;
      }

      tr:hover {
        background-color: #f1f1f1;
      }

      /* Image Styling */
      td[data-label="Image"] {
        text-align: center;
        vertical-align: middle;
        padding: 15px;
      }

      td[data-label="Image"] img {
        border-radius: 5px;
        width: 70px;
        height: 70px;
        object-fit: cover;
        display: inline-block;
        vertical-align: middle;
      }

      /* Buttons */
      .btn {
        text-decoration: none;
        padding: 10px 15px;
        border-radius: 5px;
        font-size: 14px;
        color: white;
        transition: 0.3s ease;
        display: inline-block;
      }

      .btn-primary {
        background-color: #28a745;
      }

      .btn-primary:hover {
        background-color: #218838;
      }

      .btn-danger {
        background-color: #dc3545;
      }

      .btn-danger:hover {
        background-color: #bd2130;
      }

      /* Alert */
      .alert {
        margin-bottom: 20px;
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        padding: 10px 20px;
        border-radius: 5px;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .alert button {
        background: none;
        border: none;
        font-size: 18px;
        cursor: pointer;
        color: #721c24;
      }

      /* Mobile Responsive Styles */
      @media (max-width: 768px) {
        .table-wrapper {
          overflow-x: auto;
        }

        th, td {
          font-size: 14px;
          padding: 10px;
        }

        td[data-label="Image"] img {
          width: 50px;
          height: 50px;
        }

        .btn {
          padding: 8px 12px;
          font-size: 12px;
        }
      }

      @media (max-width: 480px) {
        .container {
          padding: 10px;
        }

        table {
          border: 0;
        }

        thead {
          display: none;
        }

        tr {
          display: block;
          margin-bottom: 15px;
          border: 1px solid #ddd;
          border-radius: 8px;
          background-color: white;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        td {
          display: block;
          text-align: right;
          padding: 12px 15px;
          font-size: 14px;
          position: relative;
          border-bottom: 1px solid #eee;
        }

        td:last-child {
          border-bottom: none;
        }

        td::before {
          content: attr(data-label);
          position: absolute;
          left: 15px;
          text-align: left;
          font-weight: 600;
          color: #555;
        }

        /* Mobile image cell styling */
        td[data-label="Image"] {
          text-align: right;
          padding: 15px;
          background-color: #f8f9fc;
          display: flex;
          justify-content: flex-end;
          align-items: center;
        }

        td[data-label="Image"]::before {
          position: absolute;
          left: 15px;
          top: 50%;
          transform: translateY(-50%);
        }

        td[data-label="Image"] img {
          width: 60px;
          height: 60px;
          margin-left: auto;
          border-radius: 8px;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Button styling for mobile */
        td[data-label="Update"],
        td[data-label="Delete"] {
          text-align: center;
          padding: 10px;
        }

        td[data-label="Update"]::before,
        td[data-label="Delete"]::before {
          position: static;
          display: block;
          text-align: center;
          margin-bottom: 5px;
        }

        .btn {
          width: 100%;
          padding: 8px 12px;
          font-size: 14px;
          text-align: center;
        }

        .table-wrapper {
          overflow-x: unset;
          box-shadow: none;
          background-color: transparent;
        }
      }
    </style>
  </head>
  <body>
    @include('admin.sidebar')
    @include('admin.navbar')
    <div class="container-fluid page-body-wrapper">
      <div class="container">
        @if(session()->has('message'))
        <div class="alert">
          <span>{{ session()->get('message') }}</span>
          <button type="button" class="close" onclick="this.parentElement.style.display='none'">×</button>
        </div>
        @endif
        <div class="table-wrapper">
          <table>
            <thead>
              <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Image</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $product)
              <tr>
                <td data-label="Title">{{ $product->title }}</td>
                <td data-label="Description">{{ $product->description }}</td>
                <td data-label="Quantity">{{ $product->quantity }}</td>
                <td data-label="Price">{{ $product->price }}</td>
                <td data-label="Image"><img src="/productimage/{{ $product->image }}" alt="Product Image"></td>
                <td data-label="Update"><a class="btn btn-primary" href="{{ url('updateview', $product->id) }}">Update</a></td>
                <td data-label="Delete"><a class="btn btn-danger" href="{{ url('deleteproduct', $product->id) }}">Delete</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    @include('admin.script')
  </body>
</html>