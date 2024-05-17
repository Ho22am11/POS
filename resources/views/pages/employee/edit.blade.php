@extends('layouts.master')
@section('title')
employees
@endsection

@section('pages')
employees
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
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Age</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Salary</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
        
            
       
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div>
                      <img src="/{{ $employee->img }}" class="avatar avatar-sm me-3" alt="user6">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{ $employee->name }}</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs text-secondary mb-0">{{ $employee->age }}</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-secondary">{{ $employee->salary }}</span>
                </td>
                
                <td class="align-middle">
                  <a href="{{ route('employees.edit', $employee->id  ) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Edit
                  </a>
                </td>
              </tr>
              
            </tbody>
          </table>
        </div>
      </div>
    </div> </div>

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6> edit employees</h6>
            </div>

                
                    <form action="{{ route('employees.update' , $employee->id ) }}" method="post"  autocomplete="off" enctype="multipart/form-data">
                        @csrf
                    <div class="card-header">
                      <div class="row">
                        <div class="col">
                          
                            <label for="name">name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="name" value="{{ $employee->name }}">
                          
                        </div>
                        <div class="col">
                            <label for="type">Gender</label>
                            <select class="form-control" >
                                <option selected> selecte Gender</option>
                                <option value="1">male</option>
                                <option value="2">famle</option>

                              </select>
                          
                        </div>
                      </div>
                      <div class="row">
                        <div class="col"> 

                            <label for="age">age</label>
                            <input type="text" class="form-control" name="age" id="age" placeholder="age" value="{{ $employee->age }}">
                        </div>
                        <div class="col"> 

                            <label for="salary">salary</label>
                            <input type="text" class="form-control" name="salary" id="salary" placeholder="salary" value="{{ $employee->salary }}">
                        </div>
                        <div class="col"> 

                            <label for="img">image</label>
                            <input type="hidden" name="img" value="{{ $employee->img }}" >
                            <input name="img" type="file" class="form-control" id="img" lang="es" accept="image/*" >
                              
                              </div>

                             
                              
  
                        </div><br>
                        <div class="row">
                            <div class="col">
                            <img src=" /{{ $employee->img }}"  alt="product image" class="rounded float-right" style="width: 200px; height: 200px;" >
                            </div>

                         </div>
                         <br>
                      
                        
                       
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