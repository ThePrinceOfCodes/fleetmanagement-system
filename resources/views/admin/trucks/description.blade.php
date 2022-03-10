<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TrucksDescription</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="{{asset('css/fullcalendar.min.css')}}">
    <!-- https://fullcalendar.io/ -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="{{asset('css/tooplate.css')}}">
</head>

<body id="reportsPage">
    <div class="" id="home">
        <div class="container">
            <div class="row">
                <div class="col-12">
                                        
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="{{ route('home')}}">
                            <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                            <h1 class="tm-site-title mb-0">AG</h1>
                        </a>
                        
                        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        

                        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                            
                             <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link text-light badge badge-secondary"  href="{{ route('admin.trucks.dashboard')}}">Trucks Details</a>    
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light badge badge-secondary"  href="{{ route('admin.trucks.events')}}">Trucks Events</a>    
                                </li>
                                                        
                            </ul>
                           
                           
                            
                        </div>                    
                        </div>
                    </nav>
                    <div class="container-fluid col-md-12">
                        @if(session('errors'))
                                <div class="alert alert-danger mt-4">
                                    <li>{{session('errors')}}</li>
                                </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success mt-4">
                                <p>{{session('success')}}</p>
                            </div>
                        @endif
                    </div>
                   
                    <nav class="navbar navbar-expand-xl navbar-light bg-light">
                        <div class="nav-brand">
                            <h1 class="tm-site-title mb-0">Trucks Des..</h1>
                        </div>
                                                
                        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        
                        <!-- trucksexpenses -->
                        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent1">
                            <form action="{{route('admin.trucks.detailssearch')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <ul class="navbar-nav mx-auto">
                                    
                                    <li class="nav-item">
                                        <input type="text" name="truck_no" placeholder="Truck No">        
                                    </li>
                                    <li class="nav-item">
                                        <input type="text" name="loading_no" placeholder="Loading No.">
                                    </li>
                                    <li class="nav-item">
                                        <input type="text" name="status" placeholder="Status">
                                    </li>
                                    <li class="nav-item">
                                        <input type="text" name="driver" placeholder="Driver">
                                    </li>
                                    <li class="nav-item">
                                        <input type="text" name="drivers_mobile" placeholder="Drivers Mobile">
                                    </li>
                                    <li class="nav-item">
                                        <input  type="submit"  value="search">
                                    </li>
                                    
                                </ul>
                            </form>
                          
                        
                    </nav>
                </div>
            </div>
            <!-- row -->
                            
            <div class="col-md-12 tableview">
              @if($trucksdescription->count())
                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                  <thead class="thead-dark">
                    <tr>
                      <th class="th-sm">Truck No.

                      </th>
                      <th class="th-sm">capacity

                      </th>
                      <th class="th-sm">loading number

                      </th>
                      <th class="th-sm">date acquired

                      </th>
                      
                      <th class="th-sm">status

                      </th>
                      <th class="th-sm">driver

                      </th>
                      <th class="th-sm">drivers mobile

                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($trucksdescription as $truckdescription)
                        <div class="container">
                            <div class="modal fade" id="mobile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Input the mobile number of the driver. if the driver already 
                                            manages a truck then the old truck will be without a driver</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('admin.trucks.changedriver',$truckdescription->truck_no)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="input-group">
                                                    <input type="number"  name="mobile" placeholder="8138505718"  required>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <input  type="submit" class="btn btn-primary" value="change">
                                                
                                            </div>
                                            </div>
                                        </form>
                                        
                            </div>
                            </div>
                        </div>
                    
                      <tr>
                        <td>{{$truckdescription->truck_no}}</td>
                        <td>{{$truckdescription->capacity}}</td>
                        <td>{{$truckdescription->loading_no}} 
                            <a class="nav-link text-light badge badge-secondary" data-toggle="modal" data-target="#loading" href="">change</a>
                        </td>
                        <td>{{$truckdescription->date_acquired}}</td>
                        <td>{{$truckdescription->status}}
                        </td>
                        <td>{{$truckdescription->drivers_name}}</td>
                        <td>{{$truckdescription->drivers_mobile}}
                            <a class="nav-link text-light badge badge-secondary"  data-toggle="modal" data-target="#mobile" href="">change</a>
                            <a class="nav-link text-light badge badge-secondary" href="{{route('admin.trucks.strip',$truckdescription->truck_no)}}">strip</a>
                        </td>
                        
                        
                    </tr>
                    </div>

                    <div class="container">
                            <div class="modal fade" id="loading" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Input the new loading number. if its already used by another truck then that
                                            truck will be stripped of its loading number</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('admin.trucks.changeloading',$truckdescription->truck_no)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="input-group">
                                                    <input type="text"  name="loading_no" placeholder="eg NG-SAM087XA"  required>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <input  type="submit" class="btn btn-primary" value="change">
                                                
                                            </div>
                                            </div>
                                        </form>
                                        
                            </div>
                            </div>
                    </div>
                    
                    
                    @endforeach
                  </tbody>
                  </table>
                  <div class="pagination  justify-content-center">
                        {{$trucksdescription->links()}}
                  </div>
              @else
                <h1>RECORD DOES NOT EXIST</h1>  
              @endif  
            </div>
           
        </div>
    </div>
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <!-- https://jquery.com/download/ -->
    <script src="{{asset('js/moment.min.js')}}"></script>
    <!-- https://momentjs.com/ -->
    <script src="{{asset('js/utils.js')}}"></script>
    <script src="{{asset('js/Chart.min.js')}}"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="{{asset('js/fullcalendar.min.js')}}"></script>
    <!-- https://fullcalendar.io/ -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="{{asset('js/tooplate-scripts.js')}}"></script>
    
</body>
</html>