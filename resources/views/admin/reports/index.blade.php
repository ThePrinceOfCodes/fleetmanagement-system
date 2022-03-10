<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reports</title>
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

    <link rel="stylesheet" href="{{asset('jquery-ui-datepicker/jquery-ui.min.css')}}" type="text/css" >
    

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
                                    <a class="nav-link text-light badge badge-secondary" href="{{ route('admin.trucksexpenses.dashboard')}}">reports</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light badge badge-secondary"  href="">reports</a>    
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light badge badge-secondary" href="">reports</a>
                                </li>
                                                                
                            </ul>
                                                      
                        </div>
                    </nav>
                    <nav class="navbar navbar-expand-xl navbar-light bg-light">
                        <div class="nav-brand">
                            <h1 class="tm-site-title mb-0">Reports</h1>
                        </div>
                                                
                        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        
                        <!-- adminexpenses -->
                        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                            <form action="{{route('admin.reports.monthly')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <ul class="navbar-nav mx-auto">
                                    
                                    <li class="nav-item date" >
                                        <input type="date"   name="StartDate" data-large-mode="true" placeholder="StartDate" required>        
                                    </li>
                                    <li class="nav-item date">
                                        <input type="date"  name="EndDate" data-large-mode="true" placeholder="EndDate" required>
                                    </li>
                                    
                                    <li class="nav-item date" data-provide="datepicker">
                                        <input type="submit" name="" value="Generate Reports">
                                    </li>
                                    
                                </ul>
                            </form>
                          
                        </div>
                    </nav>
                </div>
            </div>
            <!-- row -->
            
           
        </div>
    </div>
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
   
    <script src="{{asset('jquery-ui-datepicker/jquery-ui.min.js')}}"></script>
  
    <script>
        $(function () {
            $('#start_date').datepicker();
        });
        $(function () {
            $('#end_date').datepicker();
        });
    </script>
</body>
</html>