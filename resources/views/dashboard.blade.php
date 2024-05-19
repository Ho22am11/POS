@extends('layouts.master')
@section('title')
Dashboard
@endsection

@section('pages')
Dashboard
@endsection

<body class="g-sidenav-show  bg-gray-100">
    @include('layouts.main-sidebar')	
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('layouts.main-header')	
    <!-- End Navbar -->
    <div class="container-fluid py-4">
     <!-- Navbar 2 -->
     @include('layouts.header')	
      <!-- End Navbar 2 -->

        <!-- analysis  -->
        @include('layouts.analysis')	<br>
         <!-- End analysis  -->

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
                    <a href="#" class="btn-cart me-2 px-3 pt-2 pb-2">
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

         <div>

         </div>

    

      
         @include('layouts.footer')
    </div>
    
  </main>

  
 
  <!--   Core JS Files   -->
@include('layouts.footer-scripts')
</body>

