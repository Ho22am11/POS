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

       

         <div>

         </div>

    

      
         @include('layouts.footer')
    </div>
    
  </main>

  
 
  <!--   Core JS Files   -->
@include('layouts.footer-scripts')
</body>

