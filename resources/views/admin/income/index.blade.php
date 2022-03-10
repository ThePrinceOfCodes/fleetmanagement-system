<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INCOME</title>
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
                                    <a class="nav-link text-light badge badge-secondary"  href="{{ route('admin.income.create')}}">Add INCOME</a>    
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light badge badge-secondary" data-toggle="modal" data-target="#exampleModal" href="" >Add MULTIPLE</a>    
                                </li>
                                                             
                            </ul>
                                                      
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">upload excel file containing the right format</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                    <form action="{{route('admin.income.import')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                <input type="file" id="file" name="file" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <input  type="submit" class="btn btn-primary" value="upload">
                                            
                                        </div>
                                        </div>
                                    </form>
                                
                                </div>
                            </div>
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
                            <h1 class="tm-site-title mb-0">INCOME.</h1>
                        </div>
                                                
                        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        
                        <!-- income Search -->
                        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent1">
                            <form action="{{route('admin.income.search')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <ul class="navbar-nav mx-auto">
                                    
                                    <li class="nav-item">
                                        <input type="text" name="truck_no" placeholder="Truck No">        
                                    </li>
                                    <!-- <li class="nav-item">
                                        <input type="text" name="mobile" placeholder="drivers mobile">
                                    </li> -->
                                    <li class="nav-item">
                                        <input type="text" name="shipment_no" placeholder="shipment_no">
                                    </li>
                                    <li class="nav-item">
                                        <input type="text" name="destination" placeholder="destination">
                                    </li>
                                    
                                    <li class="nav-item">
                                        <input type="number" step="0.01" name="frieght_cost" placeholder="Frieght_cost">
                                    </li>
                                    <li class="nav-item">
                                        <input type="date" name="date" placeholder="Date">
                                    </li>
                                    <!-- <li class="nav-item">
                                        <input type="text" name="location" placeholder="Location">
                                    </li> -->
                                    <li class="nav-item">
                                        <input  type="submit"  value="search">
                                    </li>
                                    
                                </ul>
                            </form>
                          
                        </div>
                    </nav>
                </div>
            </div>
            <!-- row -->
            <div class="col-md-12 tableview">
              @if($incomes->count())
                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                  <thead class="thead-dark">
                    <tr>
                        <th class="th-sm">Truck No.

                        </th>
                        
                        <th class="th-sm">shipment_no

                        </th>

                        <th class="th-sm">destination

                        </th>
                        <th class="th-sm">Frieght cost

                        </th>
                        <th class="th-sm">Frieght tax

                        </th>
                        
                        <th class="th-sm">Date
                     
                        </th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($incomes as $income)
                      <tr>
                            <td>{{$income->truck_no}}</td>
                            <td>{{$income->shipment_no}}</td>
                            <td>{{$income->destination}}</td>
                            <td>{{$income->frieght_cost}}</td>
                            <td>{{$income->tax}}</td>
                            <td>{{$income->date}}</td>
                            
                      </tr>
                    @endforeach
                  </tbody>
                  </table>
                  <div class="pagination  justify-content-center">
                        {{$incomes->links()}}
                  </div>
              @else
                    <h1>
                        NO RECORD EXIST
                    </h1>
                  
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


