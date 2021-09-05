@extends('layouts.layout')

@section('css')

    @yield('Css')
@endsection

@section('Content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Maisons</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Listes des maisons
                </h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID Conteur</th>
                            <th>Name</th>
                            <th>Region</th>
                            <th>Ville</th>
                            <th>Adresse</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID Conteur</th>
                            <th>Name</th>
                            <th>Region</th>
                            <th>Ville</th>
                            <th>Adresse</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody id="listMaison">
                        @foreach($maisons as $maison)
                            <tr id="Maison{{$maison->id_Maison}}">
                                <td>{{$maison->id_Maison}}</td>
                                <td>{{$maison->getUser()->Name_User}}</td>
                                <td>{{$maison->getVille()->getRegion()->Region_Region}}</td>
                                <td>{{$maison->getVille()->Ville_Ville}}</td>
                                <td>{{$maison->Adresse_Maison}}</td>
                                <td>
                                    <a href="/client/maison/{{$maison->id_Maison}}" class="iconEye"><i class="fas fa-eye"></i></a>
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

@section('JsFooter')
    <!-- Page level plugins -->
    <script type="text/javascript" src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script type="text/javascript" src="/js/demo/datatables-demo.js"></script>
    <!-- END PAGE LEVEL JS-->
@endsection
