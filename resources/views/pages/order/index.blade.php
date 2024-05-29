@extends('layouts.master')
@section('title')
Orders
@endsection

@section('pages')
Orders
@endsection

<body class="g-sidenav-show  bg-gray-100">
    @include('layouts.main-sidebar')	
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Navbar -->
    @include('layouts.main-header')	
    <!-- End Navbar -->

    <div class="row">
        
    <div class="row mt-4">
     <div class="col-lg-5 mb-lg-0 mb-4">
      <div class="card z-index-2">
        <div class="card-body p-3">
            <h3 class="card-title pt-3 m-3">My Orders</h3>
        </div>
       <form method="POST" action="{{ route('orders.store') }}" >
         <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-4 ">Quantity</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Parice</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
          
            @csrf
            <tbody class="order_list">

     
         
            </tbody>
            
            <tfoot class="orde">
              <tr>
                  <td colspan="2">Total</td>
                  @can('order_for custmor')
                  <td> <select name="customer_id" class="form-control" >
                    <option  value="cus" selected>chose customer</option>
                    @foreach($customers as $customer)
                    <option value="{{ $customer->id}}" >{{ $customer->name }}</option>
                    @endforeach
                    </select>
                  </td>
                  @endcan
                  <td id="total-amount">0</td>
              </tr>
          </tfoot>

          </table>
          

          <button type="submit" class="btn btn-primary submit-btn">add Order</button>
        </form>
      </div>

      
     </div>
      <div class="col-lg-7">
       <div class="card z-index-2">
        <div class="card-body p-3">
          <h3 class="card-title pt-3 m-3">Orders</h3>
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-4">#</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">customer</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Order by</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Parice</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
          
          
            <tbody >
              @foreach ($orders as $order)
              <tr>
                <td >{{ $loop->index+1 }}</td>
                <td > 
                  {{ $order->customer->user->name }}
         
              </td>
              <td>{{$order->user->name}}</td>
                <td>{{ $order->total}}</td>
                <td><a href="{{ route('orders.show', $order->id ) }}" >show</a></td>
              </tr>
                  
              @endforeach

     
         
            </tbody>
        

          </table>

        </div>
      </div>
    </div>
  </div>
    </div>

    <br>
    <br>

    <div class="row">

        @foreach ($prodects as $prodect)
           
      
        <div class="col-md-3">
          <div class="card mb-4">
            <a href="single-product.html">
              <img src="/{{$prodect->img}}" class="card-img-top img-fluid rounded-4" alt="image" style="object-fit: cover; width: 100%; height: 200px;">
            </a>
            <div class="card-body p-0">
              <a href="single-product.html">
                <h3 class="card-title pt-3 m-3">{{ $prodect->name }}</h3>
              </a>
              <div class="card-text">
                <h3 class="secondary-font text-primary m-3">{{ $prodect->amount }}</h3>
                <div class="d-flex flex-wrap mt-2">
                  <a href="#" class="btn-cart me-2 px-3 pt-2 pb-2 add-prodect-btn" id="prodect-{{ $prodect->id }}" 
                    data-name="{{ $prodect->name }}" data-id="{{ $prodect->id }}" 
                    data-amount="{{ $prodect->amount }}">
                    <h5 class="text-uppercase m-0">Add to Cart</h5>
                 </a>
             
                  <a href="#" class="btn-wishlist px-3 pt-2">
                    <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
     
          
        
   

      @endforeach
    </div>
   
   
  
   
    
  </main>

  
 
  <!--   Core JS Files   -->
@include('layouts.footer-scripts')

<script src="{{ asset('assets/js/addcar.js') }}"></script>

</body>