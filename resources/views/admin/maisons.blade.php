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
                    <button type="button" class="btn btn-success btn-circle float-right" target="_blank"  data-toggle="modal"
                       data-target="#addMaisonModal">
                        <i class="fas fa-plus"></i>
                    </button>
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
                                    <a href="/admin/maison/{{$maison->id_Maison}}" class="iconEye"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="iconEdit"><i class="fas fa-edit"></i></a>
                                    <a class="iconTrash" onclick="deleteClient({{$maison->id_Maison}})"><i
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
    @include('modals.addNewMaison')
@endsection

@section('JsFooter')
    <!-- Page level plugins -->
    <script type="text/javascript" src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script type="text/javascript" src="/js/demo/datatables-demo.js"></script>
    <script type="text/javascript">
            var clientList = $(".clientList");
            var clientInfo = $(".clientInfo");
            clientInfo.hide();

            $("#region").change(function () {
                var region = $(this).val();
                if (region != null) {
                    $.ajax({
                        type: "GET",
                        url: '/admin/getVilles',
                        data: jQuery.param({region: region,}),
                        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                        processData: false,
                        dataType: "json",
                        success: function (data) {
                            var ville = $('#ville');
                            if (data.Success === 1) {
                                ville.find('option').remove();
                                for (var i = 0; i < data.villes.length; i++)
                                    ville.append('<option value="' + data.villes[i].id_Ville + '">' + data.villes[i].Ville_Ville + '</option>')
                            } else {
                                ville.find('option').remove().end().append('<option>--------</option>');
                            }
                        }
                    });
                }
            });

            function clientCheck() {
                var check = $("#clientCheck");
                if (check.is(":checked")) {
                    clientList.hide();
                    clientInfo.show();
                } else {
                    clientInfo.hide();
                    clientList.show();
                }
            }

            function addClient() {

                var conteur = $("#id").val();
                var name = $("#name").val();
                var email = $("#email").val();
                var ville = $("#ville :selected").val();
                var address = $("#address").val();
                var client = $("#client :selected").val();
                var clientName = $("#client :selected").text();
                var clientCheck = $("#clientCheck").is(":checked");
                var client_name = ($("#clientCheck").is(":checked"))? name: clientName;
                $.ajax({
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: '/admin/addNewMaison',
                    data: jQuery.param({
                        "_token": "{{ csrf_token() }}",
                        name: name,
                        email: email,
                        conteur: conteur,
                        ville: ville,
                        address: address,
                        clientCheck: clientCheck,
                        client: client,
                    }),
                    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                    processData: false,
                    dataType: "json",
                    success: function (data) {
                        if (data.Success === true) {
                            alert("success");
                            $("#listMaison tr:first").before("<tr id=\"Maison" + conteur + "\">" +
                                "                                <td>" + conteur + "</td>" +
                                "                                <td>" + client_name + "</td>" +
                                "                                <td>" + $("#region option:selected").text() + "</td>" +
                                "                                <td>" + $("#ville option:selected").text() + "</td>" +
                                "                                <td>" + address + "</td>" +
                                "                                <td>" +
                                "                                    <a href=\"/admin/maison/" + conteur + "\" class=\"iconEye\"><i class=\"fas fa-eye\"></i></a>" +
                                "                                    <a href=\"#\" class=\"iconEdit\"><i class=\"fas fa-edit\"></i></a>" +
                                "                                    <a class=\"iconTrash\" onclick=\"deleteClient(" + conteur + ")\"><i class=\"fas fa-trash\"></i></a>" +
                                "                                </td>" +
                                "                            </tr>");
                            if ($("#clientCheck").is(":checked")){
                                $("#client option:first").before('<option value="'+data.id+'">'+client_name+'</option>');
                            }
                            $('#addMaisonModal').modal('toggle');
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
                            url: '/admin/deleteMaison',
                            data: jQuery.param({
                                "_token": "{{ csrf_token() }}",
                                id: id,
                            }),
                            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                            processData: false,
                            dataType: "json",
                            success: function (data) {
                                if (data.Success === true) {
                                    $("#Maison" + id).remove();
                                    Swal.fire(
                                        'Supprimer!',
                                        'Maison a été supprimé',
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
