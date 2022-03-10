<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colrolib Templates">
    <meta name="author" content="Colrolib">
    <meta name="keywords" content="Colrolib Templates">

    <!-- Title Page-->
    <title>Update Events</title>

    <!-- Icons font CSS-->
    <link href="{{asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('css/main.css')}}" rel="stylesheet" media="all">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="{{asset('css/tooplate.css')}}">
</head>

<body>
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
                                    <a class="nav-link text-light badge badge-secondary"  href="{{route('admin.trucks.dashboard')}}">Trucks</a>    
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light badge badge-secondary" href="{{route('admin.trucks.events')}}">Trucks Events</a>
                                </li>
                                                           
                            </ul>
                                                      
                        </div>
                    </nav>
                    
                </div>
    </div>
                       
    <div class="page-wrapper bg-img-1 p-t-165 p-b-100">
        <div class="wrapper wrapper--w720">
            <div class="card card-3">
                <div class="card-body">
                   
                    <div class="tab-content">
                     <form action="{{route('admin.trucks.eventsimport')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                        <div class="row">
                            <div class="col-md-2">
                            </div>  
                            <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Truck_no</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" name="truck_no" placeholder="eg.NG-BSA05YJ" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Event.</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" name="events" placeholder="event" required>
                                    </div>
                                                                        
                                    <!-- <div class="form-group">
                                        <label for="formGroupExampleInput">Date</label>
                                        <input type="date" class="form-control" id="formGroupExampleInput" name="date" placeholder="date" required>
                                    </div> -->
                                    <div class="form-group">
                                         <label for="formGroupExampleInput">.</label>
                                         <input type="submit" class="btn btn-primary" id="formGroupExampleInput" value="save">
                                    </div>
                                    
                            </div>
                            
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    

   
  
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="{{asset('js/tooplate-scripts.js')}}"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->