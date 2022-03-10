<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AdminExpenses</title>
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
                                    <a class="nav-link text-light badge badge-secondary" href="{{ route('admin.breakages.dashboard')}}">Breakages Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light badge badge-secondary"  href="{{route('admin.breakages.new')}}">Add breakages</a>    
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light badge badge-secondary" href="{{route('admin.iou.dashboard')}}">I.O.U</a>
                                </li>
                                                                                                
                            </ul>
                                                      
                        </div>
                    </nav>
                    <nav class="navbar navbar-expand-xl navbar-light bg-light ">
                         @if($breakages_records->count())
                            <div class="nav-brand">
                            <!-- {{$breakages_records[0]->mobile}} -->
                                <h1 class="tm-site-title mb-4 P-2">{{$breakages_records[0]->name}}, {{$breakages_records[0]->mobile}}</h1>
                            </div>
                         @endif                       
                        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        
                        
                    </nav>
                </div>
            </div>
            <!-- row -->
            <div class="col-md-12 tableview">
              @if($breakages_records->count())
                
                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                  <thead class="thead-dark">
                    <tr>
                      <th class="th-sm">
                            Truck No.
                      </th>
                      <th class="th-sm">
                            Breakages
                      </th>
                      <th class="th-sm">
                            Description
                      </th>
                      <th class="th-sm">
                            Shipment point.
                      </th>
                      <th class="th-sm">
                            Shipment No.
                      </th>
                      <th class="th-sm">
                            Shipment date.
                      </th>
                      <th class="th-sm">
                            Total cost
                      </th>
                                            
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($breakages_records as $breakages_record)
                      <tr>
                        <td>{{$breakages_record->truck_no}}</td>
                        <td>{{$breakages_record->breakages}}</td>
                        <td>{{$breakages_record->description}}</td>
                        <td>{{$breakages_record->shipment_point}}</td>
                        <td>{{$breakages_record->shipment_no}}</td>
                        <td>{{$breakages_record->shipment_date}}</td>
                        <td>{{$breakages_record->breakages_cost}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                  </table>
                  <div class="pagination  justify-content-center">
                        {{$breakages_records->links()}}
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
    <script>
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function () {
            updateChartOptions();
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart
            drawCalendar(); // Calendar

            $(window).resize(function () {
                updateChartOptions();
                updateLineChart();
                updateBarChart();
                reloadPage();
            });
        })
    </script>
</body>
</html>