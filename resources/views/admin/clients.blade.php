@extends('layouts.layout')

@section('css')

    @yield('Css')
@endsection

@section('Content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Client</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Listes des Clients
                    <a class="btn btn-success btn-circle float-right" target="_blank" href="#" data-toggle="modal"
                       data-target="#addClientModal">
                        <i class="fas fa-plus"></i>
                    </a>
                </h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody id="listClient">
                        @foreach($clients as $client)
                            <tr id="Client{{$client->id_User}}">
                                <td>{{$client->id_User}}</td>
                                <td>{{$client->Name_User}}</td>
                                <td>{{$client->Email_User}}</td>
                                <td>
                                    <a href="/admin/client/{{$client->id_User}}" class="iconEye"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="iconEdit"><i class="fas fa-edit"></i></a>
                                    <a class="iconTrash" onclick="deleteClient({{$client->id_User}})"><i
                                            class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    @include('modals.addNewClient')
@endsection

@section('JsFooter')
    <!-- Page level plugins -->
    <script type="text/javascript" src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script type="text/javascript" src="/js/demo/datatables-demo.js"></script>
    <script type="text/javascript">

        function addClient() {

            var name = $("#name").val();
            var email = $("#email").val();
            var type = $("#type").val();
            $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '/admin/addNewClient',
                data: jQuery.param({
                    "_token": "{{ csrf_token() }}",
                    name: name,
                    email: email,
                    type: type,
                }),
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                processData: false,
                dataType: "json",
                success: function (data) {
                    if (data.Success === true) {
                        alert("success");
                        $("#listClient tr:first").before("<tr id=\"Client" + data.idUser + "\">" +
                            "                                <td>" + data.idUser + "</td>" +
                            "                                <td>" + name + "</td>" +
                            "                                <td>" + email + "</td>" +
                            "                                <td>" +
                            "                                    <a href=\"/admin/client/" + data.idUser + "\" class=\"iconEye\"><i class=\"fas fa-eye\"></i></a>" +
                            "                                    <a href=\"#\" class=\"iconEdit\"><i class=\"fas fa-edit\"></i></a>" +
                            "                                    <a class=\"iconTrash\" onclick=\"deleteClient(" + data.idUser + ")\"><i class=\"fas fa-trash\"></i></a>" +
                            "                                </td>" +
                            "                            </tr>");
                        $('#addClientModal').modal('toggle');
                    } else {
                        alert("failed");
                    }
                }
            });
        }

        function deleteClient(id) {
            Swal.fire({
                title: 'Etes-vous sur?',
                text: "Vous ne pouvez plus récuperer ces données!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, supprimer!',
                cancelButtonText: 'Annuler',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: '/admin/deleteUser',
                        data: jQuery.param({
                            "_token": "{{ csrf_token() }}",
                            id: id,
                        }),
                        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                        processData: false,
                        dataType: "json",
                        success: function (data) {
                            if (data.Success === true) {
                                $("#Client" + id).remove();
                                Swal.fire(
                                    'Supprimer!',
                                    'Client a été supprimé',
                                    'success'
                                );
                            } else {
                                Swal.fire(
                                    'Attention!',
                                    'une erreur est survenue',
                                    'error'
                                );
                            }
                        }
                    });
                }
            })
        }

    </script>
    <!-- END PAGE LEVEL JS-->
@endsection
