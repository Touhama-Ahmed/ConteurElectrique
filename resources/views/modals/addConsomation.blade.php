<!-- Logout Modal-->
<div class="modal fade bd-example-modal-lg" id="addConsomation" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100" id="exampleModalLabel">Consomation</h5>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/addConsomation" method="post">
                    @csrf
                    <input type="text" value="{{$maison->id_Maison}}" name="Id_Maison" hidden>
                    <input type="text" value="{{($lastConsomation != null)?$lastConsomation->Isactive_Consomation:0}}" name="Isactive" hidden>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 clientInfo">
                            <div class="form-group">
                                <label for="courrant" class="col-form-label">Courrant:</label>
                                <input type="number" min="0" class="form-control" id="courrant" name="courrant">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 clientInfo">
                            <div class="form-group">
                                <label for="Fpuissance" class="col-form-label">Facteur de puissance:</label>
                                <input type="number" min="0" class="form-control" id="Fpuissance" name="Fpuissance">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="tension" class="col-form-label">Tension:</label>
                                <input type="number" min="0" class="form-control" id="tension" name="tension">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="frequence" class="col-form-label">Frequence:</label>
                                <input type="number" min="0" class="form-control" id="frequence" name="frequence">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="energie" class="col-form-label">Energie:</label>
                                <input type="number" min="0" class="form-control" id="energie" name="energie">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="puissance" class="col-form-label">Puissance:</label>
                                <input type="number" min="0" class="form-control" id="puissance" name="puissance">
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div>
                        <button type="button" class="btn btn-dark float-right ml-3" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">Fermer</span>
                        </button>
                        <button type="submit" class="btn btn-success float-right" onclick="addClient()">
                            <span aria-hidden="true">Ajouter</span>
                        </button>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
