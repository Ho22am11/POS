@extends('layouts.master')
@section('title')
Users
@endsection

@section('pages')
Users
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
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
        
              @foreach ($users as $user)
              <tr>
               
                    
               
                <td>
                  <div class="d-flex px-2 py-1">
                    
                    <div class="d-flex flex-column justify-content-center">
                      <p class="text-xs font-weight-bold mb-0">{{ $user->name }}</p>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-secondary"> {{ implode(', ', $user->getRoleNames()->toArray()) }}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold"><a href="{{ route('roles.edit', $user )}}">Edit</a></span>
                </td>
                <td class="align-middle">
                  
                </td>

              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>




    </div> </div>
    

    <div class="row">
        <div class="col-6">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6> add Users</h6>
            </div>


                
                    <form action="{{ route('roles.store') }}" method="post"  autocomplete="off" enctype="multipart/form-data">
                        @csrf
                    <div class="card-header">
                      <div class="row">
                        <div class="col">
                          
                            <label for="name">name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="name">
                          
                        </div>
                        <div class="col">
                            <label for="type">Role</label>
                            <select class="form-control" name="role" >
                                <option selected> selecte Role</option>
                                <option value="admin">Admin</option>
                                <option value="employee">employee</option>
                                <option value="user">User</option>

                              </select>
                          
                        </div>
                      </div>
                      <div class="row">
                        <div class="col"> 

                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="email">
                        </div>
                        <div class="col"> 

                            <label for="password">password</label>
                            <input type="password" class="form-control" name="password"  placeholder="password">
                        </div>
                       
                      </div>       <br>                
                         
                       
                        <button type="submit" class="btn btn-primary">add user </button>

                    </div>
                      </form>
                
            
          </div>
        </div>
        <div class="col-6">
          <div class="card z-index-2">
           <div class="card-body p-3">
             <h3 class="card-title pt-3 m-3">Role</h3>
             <table class="table align-items-center mb-0">
               <thead>
                 <tr>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-4">#</th>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">name</th>
                   <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                   <th class="text-secondary opacity-7"></th>
                 </tr>
               </thead>
    
               <tbody >
  
                @foreach($roles as $role)
                <tr>
                  <td></td>
                  <td>{{ $role->name }}</td>
                  <td><span class="text-secondary text-xs font-weight-bold"><a>Edit</a></span></td>
                </tr>

                @endforeach
        
            
               </tbody>
           
   
             </table>
   
           </div>
         </div>
    </div>
  
   
    
  </main>

  
 
  <!--   Core JS Files   -->
@include('layouts.footer-scripts')
</body>