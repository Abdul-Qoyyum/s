@extends('userdashboard')
@section('content')
<!-- Top section -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow">
        <div class="card-body">
            <!-- Pills section -->

            <div class="bs-example">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#lead" class="nav-link active" data-toggle="tab">Leads</a>
                    </li>
                    <li class="nav-item">
                        <a href="#shoot" class="nav-link" data-toggle="tab">Shoots</a>
                    </li>
                    <li class="nav-item">
                        <a href="#payment" class="nav-link" data-toggle="tab">Payments</a>
                    </li>
                    <li class="nav-item">
                        <a href="#revenue" class="nav-link" data-toggle="tab">Revenue Comparison</a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="lead">
                        <canvas id="leads"></canvas>
                    </div>
                    <div class="tab-pane fade" id="shoot">
                        <canvas id="shoots" width="400" height="150"></canvas>
                    </div>
                    <div class="tab-pane fade" id="payment">
                        <canvas id="payments" width="400" height="150"></canvas>
                    </div>
                    <div class="tab-pane fade" id="revenue">
                        <canvas id="revenues" width="400" height="150"></canvas>
                    </div>
                </div>
            </div>

            <!-- end pills section -->
        </div>
        </div>

    </div>
</div>





<!-- end top section -->
          <div class="row">

            <div class="col-lg-6">

              <!-- Default Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header">
                  Upcoming Shoots & Appointments
                </div>
                <div class="card-body">
                  <table id="shoots_table" class="table display">
                    <thead>
                        <tr>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                 </table>
                </div>
              </div>

              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold">Most Recent Leads</h6>
                </div>
                <div class="card-body">
                  <table id="leads_table" class="table display">
                    <thead>
                        <tr>
                            <th>Lead Created</th>
                            <th>Lead</th>
                            <th>Mail Status</th>
                            <th>Next Task</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($leads as $lead)
                        <tr>
                            <td>{{$lead->created_at->diffForHumans()}}</td>
                            <td>{{$lead->name}}</td>
                            <td>New lead</td>
                            <td>Initial enquiry..</td>
                            <td>
                                <!-- Default dropright button -->
                                <div class="dropright">
                                <div class="test" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>
                                <div class="dropdown-menu">
                                    <!-- Dropdown menu links -->

                                    <ul class="navbar-nav mx-4 w-60">
                                        <li class="nav-item" style="cursor: pointer;">
                                            <a href="{{route('lead.show',$lead->id)}}"><i class="fas fa-eye"></i> View Lead</a>
                                        </li>
                                        <li class="nav-item active mb-2" style="cursor: pointer;">
                                            <div  href="#exampleModalLong" data-toggle="modal"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send Email</div>
                                        </li>
                                        <li class="nav-item" style="cursor: pointer;">
                                            <a href="{{route('lead.edit',$lead->id)}}"><i class="fas fa-edit"></i> Edit Lead</a>
                                        </li>
                                    </ul>
                                </div>
                                </div>

                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                 </table>

                </div>
              </div>

            </div>

            <div class="col-lg-6">

              <!-- Dropdown Card Example -->
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold">Overdue & Upcoming Payments</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <table id="overdues_table" class="table display">
                    <thead>
                        <tr>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                 </table>

                </div>
              </div>

              <!-- Collapsable Card Example -->
              <div class="card shadow mb-4">
                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold">Job Tasks with Due Dates</h6>
                </div>
                  <div class="card-body">
                  <table id="task_table" class="table display">
                    <thead>
                        <tr>
                          <th>Task Due</th>
                          <th>Job</th>
                          <th>Next Task</th>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($tasks as $task)
                        <tr>
                          <td>{{$task->end_date}}</td>
                          <td>{{$task->job->name}}</td>
                          <td>Send Gift to bride</td>
                             <td>
                                <!-- Default dropright button -->
                                <div class="dropright">
                                <div class="test" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>
                                <div class="dropdown-menu">
                                    <!-- Dropdown menu links -->

                                    <ul class="navbar-nav mx-4 w-60">
                                        <li class="nav-item active mb-2" style="cursor: pointer;">
                                            <a  href="{{route('jobs.show',$task->id)}}"><i class="fa fa-eye" aria-hidden="true"></i> View Job</a>
                                        </li>
                                        <li class="nav-item" style="cursor: pointer;">
                                            <a href="{{route('jobs.edit',$task->id)}}"><i class="fas fa-edit"></i> Edit Job</a>
                                        </li>
                                    </ul>
                                </div>
                                </div>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                 </table>
                  </div>
              </div>

            </div>

          </div>

@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
    <script>
        var leads = document.getElementById('leads').getContext('2d');
        var leads = new Chart(leads, {
            type: 'line',
            data: {
                labels: [<?php foreach($leadsDate as $value){
                  echo "'$value'" . ",";
                }?>],
                datasets: [{
                    label: 'Leads',                    
                    data: [<?php foreach($leadsNumber as $value){
                      echo $value . ",";
                    } ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        // initialise tables
        $(document).ready( function () {
          $('#shoots_table').DataTable();
          $('#leads_table').DataTable();
          $('#overdues_table').DataTable();
          $('#tasks_table').DataTable();
          
        } );
    </script>
@endsection