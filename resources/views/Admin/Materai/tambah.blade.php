<!-- MODAL TAMBAH -->
 <div class="model fade" data-bs-backdrop="static" id="modaldemo8">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <!-- <h6 class="modal-title">Tambah Data</h6> <button> -->
                <h6 class="modal-title">Tambah Request</h6><button aria-label="Close" onclick="reset()" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="matkode" class="form-label">Kode Materai <span class="text-danger">*</span></label>
                            <input type="text" name="matkode" readonly class="form-control" placeholder="true">
                        </div>
                        <div class="form-group">
                            <label for="matname"class="form-label">Nama User</label>
                            <input type="text" name="matname" readonly class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="mattanggal" class="form-label">Tanggal</label>
                            <input type="text" name="mettangal" readonly class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="matstock" class="form-label">Stock</label>
                            <input type="text" name="mtstock" class="form-control" placeholder="">
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" name="kdbarang" placeholder="">
                            <button class="btn btn-primary-light" id="n"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>