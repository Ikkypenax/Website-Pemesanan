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

{{-- <style>
        #sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 200px;
            z-index: 1000;
            background: #343a40;
            color: #fff;
            transition: all 0.3s;
            overflow-y: auto;
        }

        #content {
            margin-left: 200px;
            transition: all 0.3s;
        }

        #sidebar.active {
            margin-left: -200px;
        }

        #content.active {
            margin-left: 0;
        }

        #sidebarCollapse {
            position: absolute;
            top: 0;
            right: -45px;
            width: 40px;
            height: 40px;
            background: #343a40;
            color: #fff;
            border-radius: 3px;
            text-align: center;
            line-height: 40px;
            cursor: pointer;
            transition: all 0.3s;
        }

        #sidebarCollapse:hover {
            background: #232931;
        }

        select[name=status] {
            width: 100px;
            padding: 5px;
            font-size: 16px;
        }

        /* Form */
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .form-container .form-group {
            margin-bottom: 15px;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-container input,
        {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        }

        .form-container select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            appearance: none;
            background-color: #fff;
            background-image: url('data:image/svg+xml;charset=US-ASCII,<svg xmlns="http://www.w3.org/2000/svg" width="4" height="5" viewBox="0 0 4 5"><path fill="%23ccc" d="M2 0L0 2h4L2 0zm0 5L0 3h4l-2 2z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 10px 10px;
        }

        .form-container button {
            background-color: #26e03b;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            width: 120px;
            font-size: 16px;
        }

        .form-container button:hover {
            background-color: #17ac28;
        }

        /* Table */
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            padding: 8px 12px;
            margin: 2px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            display: inline-block;
        }

        .btn-warning {
            background-color: #ffc107;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-success {
            background-color: #19d900;
            color: white;
        }

        .btn i {
            margin-right: 4px;
        }
    </style> --}}