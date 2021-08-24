<!-- Logout Modal-->
<div class="modal fade bd-example-modal-lg" id="addClientModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nouveau client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="id" class="col-form-label">Id Conteur:</label>
                                <input type="text" class="form-control" id="id" name="id">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="name" class="col-form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="email" class="col-form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="address" class="col-form-label">Adresse:</label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="region" class="col-form-label">Region:</label>
                                <select class="form-control" id="region" name="region">
                                    <option>--------</option>
                                    @foreach($regions as $region)
                                    <option value="{{$region->id_Region}}">{{$region->Region_Region}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="ville" class="col-form-label">Ville:</label>
                                <select class="form-control" id="ville" name="ville">
                                    <option>--------</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div>
                        <button type="button" class="btn btn-dark float-right ml-3" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">Fermer</span>
                        </button>
                        <button type="button" class="btn btn-success float-right" onclick="addClient()">
                            <span aria-hidden="true">Ajouter</span>
                        </button>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
