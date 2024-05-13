@extends('layouts.master')
@section('title')
Prodects
@endsection

@section('pages')
Prodects
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
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">type</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">price</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">quantity</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>

              @foreach ($prodects as $prodect)
                  
              
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div>
                      <img src="{{ $prodect->img }}" class="avatar avatar-sm me-3" alt="user6">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{ $prodect->name }}</h6>
                      
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">{{ $prodect->typeprodect->name }}</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-secondary">{{ $prodect->amount }}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">{{ $prodect->count }}</span>
                </td>
                <td class="align-middle">
                  <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Edit
                  </a>
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
              
              <h6> add prodect</h6>
            </div>

                
                    <form action="{{ route('prodects.store') }}" method="post"  autocomplete="off" enctype="multipart/form-data">
                        @csrf
                    <div class="card-header">
                      <div class="row">
                        <div class="col">
                          
                            <label for="name">name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="name">
                          
                        </div>
                        <div class="col">
                            <label for="type">type</label>
                            <select class="form-control" name="id_type">
                                <option selected> selecte type</option>
                                @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name}}</option>
                                @endforeach
                            
                              </select>
                          
                        </div>
                      </div>
                      <div class="row">
                        <div class="col"> 

                            <label for="amount">price</label>
                            <input type="text" class="form-control" name="amount" id="amount" placeholder="price">
                        </div>
                        <div class="col"> 

                            <label for="count">quantity</label>
                            <input type="text" class="form-control" name="count" id="count" placeholder="quantity">
                        </div>
                        <div class="col"> 

                            <label for="img">image</label>
                             <input name="img" type="file" class="form-control" id="img" lang="es" accept="image/*">
                              
                              </div>
                              
  
                        </div><br>
                      
                        
                       
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