<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Drivers</title>
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
                                    <a class="nav-link text-light badge badge-secondary"  href="{{route('admin.driver.dashboard')}}">Drivers Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light badge badge-secondary" href="{{ route('admin.breakages.dashboard')}}">Breakages Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light badge badge-secondary" href="{{route('admin.iou.dashboard')}}">I.O.U</a>
                                </li>
                                                       
                                                                                                
                            </ul>
                                                      
                        </div>
                        
                    </nav>
                    @if(session('errors'))
                        @foreach($errors as $error)
                            <div class="alert alert-danger mt-4">
                                <li>{{$error}}</li>
                            </div>
                        @endforeach
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success mt-4">
                            <p>{{session('success')}}</p>
                        </div>
                    @endif
                    @if(isset($errors)&& $errors->any())
                        <div class="alert alert-danger mt-4">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </div>
                    @endif
                    <nav class="navbar navbar-expand-xl navbar-light bg-light">
                        <div class="nav-brand">
                            <h1 class="tm-site-title mb-0">Drivers Details</h1>
                        </div>
                                                
                        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        
                        <!-- breakages -->
                        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                            
                            <form action="{{route('admin.driver.search')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <ul class="navbar-nav mx-auto">
                                    
                                    <li class="nav-item">
                                        <input type="text" name="name" placeholder="Name. ">        
                                    </li>
                                    <li class="nav-item">
                                        <input type="number" name="mobile" placeholder="Mobile">
                                    </li>
                                    <li class="nav-item">
                                        <input type="text"  name="licence_no" placeholder="Licence No.">
                                    </li>
                                    <li class="nav-item">
                                        <input type="text"  name="licence_status" placeholder="Licence Status.">
                                    </li>
                                    
                                    <li class="nav-item">
                                        <input type="submit" name="" value="search">
                                    </li>
                                    
                                </ul>
                            </form>
                          
                        </div>
                    </nav>
                </div>
            </div>
            <div class="col-md-12 tableview">
              @if($drivers->count())
                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                  <thead class="thead-dark">
                    <tr>
                      <th class="th-sm">Name.

                      </th>
                      <th class="th-sm">Mobile

                      </th>
                      <th class="th-sm">Licence No.

                      </th>
                      <th class="th-sm">Licence No expiry date.

                      </th>

                      <th class="th-sm">Licence statue.

                      </th>
                      <th class="th-sm">Year of birth.

                      </th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($drivers as $driver)
                      <tr>
                            <td>{{$driver->name}}</td>
                            <td>{{$driver->mobile}}</td>
                            <td>{{$driver->licence_no}}</td>
                            <td>{{$driver->licence_expirydate}}</td>
                            <td>{{$driver->licence_status}}</td>
                            <td>{{$driver->yob}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                  </table>
                  <div class="pagination  justify-content-center">
                        {{$drivers->links()}}
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