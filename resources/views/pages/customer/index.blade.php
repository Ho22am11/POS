@extends('layouts.master')
@section('title')
customers
@endsection

@section('pages')
customers
@endsection

<body class="g-sidenav-show  bg-gray-100">
    @include('layouts.main-sidebar')	
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('layouts.main-header')	
    <!-- End Navbar -->
   
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
       <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone Number</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
        
              @foreach ($customers as $customer)
              <tr>
               
                    
               
                <td>
                  <div class="d-flex px-2 py-1">
                    
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{ $customer->name }}</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">{{ $customer->email }}</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-secondary">{{ $customer->num }}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">{{ $customer->addrese }}</span>
                </td>
                <td class="align-middle">
                  @can('edit coustomer')
                  <a href="{{ route('customers.edit' , $customer->id  )}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Edit
                  </a>
                  @endcan
                </td>

              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div> </div>
    

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6> add Customer</h6>
            </div>


                
                    <form action="{{ route('customers.store') }}" method="post"  autocomplete="off" enctype="multipart/form-data">
                        @csrf
                    <div class="card-header">
                      <div class="row">
                        <div class="col">
                          
                            <label for="name">name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="name">
                          
                        </div>
                        <div class="col">
                            <label for="password">password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="password">
                          
                        </div>
                      </div>
                      <div class="row">
                        <div class="col"> 

                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="email">
                        </div>
                        <div class="col"> 

                            <label for="Address">Address</label>
                            <input type="text" class="form-control" name="addrese" id="Address" placeholder="Address">
                        </div>
                        <div class="col"> 

                            <label for="num">phone number</label>
                            <input type="text" class="form-control" name="num" id="num" placeholder="num">
                        </div>

                       
                      </div>       <br>                
                         
                       
                        <button type="submit" class="btn btn-primary">add prodect</button>

                    </div>
                      </form>
                
            
          </div>
        </div>
    </div>
  
   
    
  </main>

  
 
  <!--   Core JS Files   -->
@include('layouts.footer-scripts')
</body>