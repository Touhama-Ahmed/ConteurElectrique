@extends('layouts.layout')

@section('css')

    @yield('Css')
@endsection

@section('Content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Maison</h1>
            <a class="d-none d-sm-inline-block btn btn-success btn-circle shadow-sm" target="_blank" href="#" data-toggle="modal"
               data-target="#addConsomation">
                <i class="fas fa-plus"></i>
            </a>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        @if($nbConsomations > 0)
        <div class="row">
            <!-- Courrant (Amper) -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Courrant (Amper)</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$lastConsomation->Courrant_Consomation}}</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                 style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Facteur de puissance -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Facteur de puissance</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$lastConsomation->Facteurpuissance_Consomation}}</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                 style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tension -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tension
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$lastConsomation->Tension_Consomation}}</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                 style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Frequence -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Frequence</div>
                                <div class="col-auto">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$lastConsomation->Frequence_Consomation}}</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar"
                                                     style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Content Row -->

        <div class="row">

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="col-12">
                    <div class="card shadow mb-4">
                        <!-- Maison -->
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Maison</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                     aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="pt-2 pb-2">
                                <div class="form-group">
                                    @if($nbConsomations > 0)
                                    <h3 class="col-form-label">Elec <label class="switch float-right ml-2">
                                            <input type="checkbox" id="clientCheck" name="clientCheck" onchange="consomationCheck({{$lastConsomation->Isactive_Consomation}})"
                                            @if($lastConsomation != null)
                                                @if($lastConsomation->Isactive_Consomation)
                                                    checked
                                                   @endif
                                            @endif
                                            >
                                            <span class="slider round"></span>
                                        </label>
                                    </h3>
                                    @endif
                                    <h3 class="col-form-label">Propriétaire <span class="float-right">{{$maison->getUser()->Name_User}}</span></h3>

                                    <h3 class="col-form-label">ID Conteur <span class="float-right" id="MaisonId">{{$maison->id_Maison}}</span></h3>

                                    <h3 class="col-form-label">Region <span class="float-right">{{$maison->getVille()->getRegion()->Region_Region}}</span></h3>

                                    <h3 class="col-form-label">Ville <span class="float-right">{{$maison->getVille()->Ville_Ville}}</span></h3>

                                    <h3 class="col-form-label">Adresse</h3>


                                    <h3 class="col-form-label text-center">{{$maison->Adresse_Maison}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    @if($nbConsomations > 0)
                    <input type="text" id="puissance" value="{{$lastConsomation->PuissanceW_Consomation}}" hidden>
                    <input type="text" id="energie" value="{{$lastConsomation->Energie_Consomation}}" hidden>
                    @endif
                    <!-- Pie Chart -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Energie/Puissance</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                     aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="myPieChart"></canvas>
                            </div>
                            <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> puissance
                                        </span>
                                <span class="mr-2">
                                            <i class="fas fa-circle" style="color: #feff47"></i> Energie
                                        </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                 aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Consomations</h6>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Courrant</th>
                                    <th>Tension</th>
                                    <th>Energie</th>
                                    <th>Facteurpuissance</th>
                                    <th>Frequence</th>
                                    <th>PuissanceW</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Date</th>
                                    <th>Courrant</th>
                                    <th>Tension</th>
                                    <th>Energie</th>
                                    <th>Facteurpuissance</th>
                                    <th>Frequence</th>
                                    <th>PuissanceW</th>
                                </tr>
                                </tfoot>
                                <tbody id="listMaison">
                                @if($nbConsomations > 0)
                                @foreach($consomations as $consomation)
                                    <tr id="Maison{{$consomation->id_Consomation}}">
                                        <td>{{$consomation->created_at}}</td>
                                        <td>{{$consomation->Courrant_Consomation}}</td>
                                        <td>{{$consomation->Tension_Consomation}}</td>
                                        <td>{{$consomation->Energie_Consomation}}</td>
                                        <td>{{$consomation->Facteurpuissance_Consomation}}</td>
                                        <td>{{$consomation->Frequence_Consomation}}</td>
                                        <td>{{$consomation->PuissanceW_Consomation}}</td>
                                    </tr>
                                @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    @include('modals.addConsomation')
@endsection

@section('JsFooter')
    <!-- Page level plugins -->
    <script type="text/javascript" src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script type="text/javascript" src="/js/demo/datatables-demo.js"></script>
    @if($nbConsomations > 0)
    <script type="text/javascript">
        function consomationCheck(check) {
            var id= {{$lastConsomation->id_Consomation}};
            $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '/admin/setConsomation',
                data: jQuery.param({
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    isActive: check,
                }),
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                processData: false,
                dataType: "json",
                success: function (data) {
                    if (data.Success === true) {
                        alert("success");
                    } else {
                        alert("failed");
                    }
                }
            });
        }
    </script>
    @endif
    <!-- END PAGE LEVEL JS-->
@endsection
