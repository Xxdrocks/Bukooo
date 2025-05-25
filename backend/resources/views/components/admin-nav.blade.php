 <style>
     body {
            font-family: 'Poppins', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
            color: #333;

        }

     .sidebar {

         width: 250px;
          height: 100vh;
         background-color: #ffffff;
         display: flex;
         flex-direction: column;
     }

     .sidebar h2 {
         padding: 20px;
         font-size: 20px;
         font-weight: bold;
         color: #007bff;
         border-bottom: 1px solid #ddd;
     }

     .sidebar nav {
         flex: 1;
         padding: 20px;
     }

     .sidebar a {
         display: block;
         padding: 10px 0;
         color: #333;
         text-decoration: none;
         font-weight: 500;
     }

     .sidebar a:hover {
         color: #007bff;
     }
 </style>

 <div class="sidebar">

     <nav>
         <a href="{{ route('admin.dashboard') }}">Dashboard</a>
         <a href="{{ route('user.index') }}">User</a>
         <a href="{{ route('product.index') }}">Product</a>
         <a href="{{ route('payments.index') }}">Order</a>
     </nav>
 </div>
