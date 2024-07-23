<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tambah_rp.update', $tambahRp->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="biaya_transportasi">Biaya Transportasi:</label>
                        <input type="text" class="form-control" id="biaya_transportasi" name="biaya_transportasi"
                            value="{{ $tambahRp->biaya_transportasi }}">
                    </div>
                    <div class="form-group">
                        <label for="biaya_pemasangan">Biaya Pemasangan:</label>
                        <input type="text" class="form-control" id="biaya_pemasangan" name="biaya_pemasangan"
                            value="{{ $tambahRp->biaya_pemasangan }}">
                    </div>
                    <div class="form-group">
                        <label for="biaya_jasa">Biaya Jasa:</label>
                        <input type="text" class="form-control" id="biaya_jasa" name="biaya_jasa"
                            value="{{ $tambahRp->biaya_jasa }}">
                    </div>
                    <div class="form-group">
                        <label for="biaya_service">Biaya Service:</label>
                        <input type="text" class="form-control" id="biaya_service" name="biaya_service"
                            value="{{ $tambahRp->biaya_service }}">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <p>{{$lokasi->id}}</p>
                    <div>
                        <label for="biaya_transportasi">Biaya Transportasi:</label>
                        <input type="text" name="biaya_transportasi" id="biaya_transportasi">
                    </div>
                    <div>
                        <label for="biaya_pemasangan">Biaya Pemasangan:</label>
                        <input type="text" name="biaya_pemasangan" id="biaya_pemasangan">
                    </div>
                    <div>
                        <label for="biaya_jasa">Biaya Jasa:</label>
                        <input type="text" name="biaya_jasa" id="biaya_jasa">
                    </div>
                    <div>
                        <label for="biaya_service">Biaya Service:</label>
                        <input type="text" name="biaya_service" id="biaya_service">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</div>
