<!-- MODAL EDIT -->
<div class="modal fade" data-bs-backdrop="static" id="Umodaldemo8">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Ubah Request</h6><button onclick="resetU()" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" name="idrequestU">               
                        <div class="form-group">
                            <label for="reqkodeU" class="form-label">Kode Request <span class="text-danger">*</span></label>
                            <input type="text" name="reqkodeU" readonly class="form-control" placeholder="">
                        </div>        
                        <div class="form-group">
                            <label for="tglrequestU" class="form-label">Tanggal Request <span class="text-danger">*</span></label>
                            <input type="text" name="tglrequestU" class="form-control datepicker-date" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="namaU" class="form-label">User</label>
                            <input type="text" name="namaU" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="divisiU" class="form-label">Dept<span class="text-danger">*</span></label>
                            <input type="text" name="divisiU" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="barangU" class="form-label">Nama Barang</label>
                            <input type="text" name="barangU" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="jumlahU" class="form-label">Quantity<span class="text-danger">*</span></label>
                            <input type="text" name="jumlahU" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" placeholder="">
                        </div>          
                    </div>   
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title" class="form-label">Gambar</label>
                                <center>
                                <img src="{{url('/assets/default/barang/image.png')}}" width="80%" alt="profile-user" id="outputImgU" class="">
                                </center>
                            <input class="form-control mt-5" id="GetFileU" name="photo" type="file" onchange="VerifyFileNameAndFileSizeU()" accept=".png,.jpeg,.jpg,.svg">
                        </div>  
                    </div>                         
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success d-none" id="btnLoaderU" type="button" disabled="">
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
                <a href="javascript:void(0)" onclick="checkFormU()" id="btnSimpanU" class="btn btn-success">Simpan Perubahan <i class="fe fe-check"></i></a>
                <a href="javascript:void(0)" class="btn btn-light" onclick="resetU()" data-bs-dismiss="modal">Batal <i class="fe fe-x"></i></a>
            </div>
        </div>
    </div>
</div>

@section('formEditJS')
    <script>  
        function checkFormU(){
            const reqkode = $("input[name = 'reqkodeU']").val();
            const tglrequest = $("input[name = 'tglrequestU']").val();
            const divisi = $("input[name= 'divisiU']").val();
            setLoadingU(true);
            resetValidU();
            if(reqkode == ""){
                validasi('Kode Barang wajib di isi!', 'warning');
                $("input[name='reqkodeU']").addClass('is-invalid');
                setLoadingU(Ufalse);
                return(false);
            }else if(tglrequest == ""){
                validasi('Tanggal Request wajib di isi!', 'warning');
                $("input[name='tglrequestU']").addClass('is-invalid');
                setLoadingU(false);
                return(false);
            }else if (divisi == "") {
                validasi('Departement wajib di isi!', 'warning');
                $("input[name='divisiU']").addClass('is-invalid');
                setLoadingU(false);
                return(false);
            }else{
                submitFormU();
            }
        }
        function submitFormU(){
            const id = $("input[name= 'idrequestU']").val();
            const reqkode = $("input[name='reqkodeU']").val();
            const tglrequest = $("input[name='tglrequestU']").val();
            const nama = $("input[name='namaU']").val();
            const divisi = $("input[name='divisiU']").val();
            const barang = $("input[name='barangU']").val();
            const jumlah = $("input[name='jumlahU']").val();
            const foto = $('#GetFileU')[0].files;
            var fd = new FormData();

            //Append data
            fd.append('foto', foto[0]);
            fd.append('reqkode', reqkode);
            fd.append('tglrequest', tglrequest);
            fd.append('nama', nama);
            fd.append('divisi', divisi);
            fd.append('barang', barang);
            fd.append('jumlah', jumlah);
            $.ajax({
                type: 'POST',
                url : "{{url('admin/order/proses_ubah')}}/" + id,
                processData: false,
                contentType: false,
                dataType: 'json',
                data: fd,
                success: function(data) {
                    swal({
                        title: "Request berhasil diubah!",
                        type: "success"
                    });
                    $('#Umodaldemo8').modal('toggle');
                    table.ajax.reload(null, false);
                    resetU();
                }
            });
        }

        function resetValidU() {
            $("input[name='reqkodeU']").removeClass('is-invalid');
            $("input[name='tglrequestU']").removeClass('is-invalid');
            $("input[name='namaU']").removeClass('is-invalid');
            $("input[name='divisiU']").removeClass('is-invalid');
            $("input[name='barangU']").removeClass('is-invalid');
            $("input[name='jumlahU']").removeClass('is-invalid');
        }
        function resetU() {
            resetValidU();
            $("input[name='idrequestU']").val('');
            $("input[name='reqkodeU']").val('');
            $("input[name='tglrequestU']").val('');
            $("input[name='namaU']").val('');
            $("input[name='divisiU']").val('');
            $("input[name='barangU']").val('');
            $("input[name='jumlahU']").val('0');
            $("#nmbarangU").val('');
            $("#satuanU").val('');
            $("#jenisU").val('');
            $("#statusU").val('false');
            $("#outputImgU").attr("src", "{{url('/assets/default/barang/image.png')}}");
            $("#GetFileU").val('');
            setLoadingU(false);
        }
        function setLoadingU(bool) {
            if (bool == true) {
                $('#btnLoaderU').removeClass('d-none');
                $('#btnSimpanU').addClass('d-none');
            } else {
                $('#btnSimpanU').removeClass('d-none');
                $('#btnLoaderU').addClass('d-none');
            }
        }
        function fileIsValidU(fileName) {
            var ext = fileName.match(/\.([^\.]+)$/)[1];
            ext = ext.toLowerCase();
            var isValid = true;
            switch (ext) {
                case 'png':
                case 'jpeg':
                case 'jpg':
                case 'svg':
                    break;
                default:
                    this.value = '';
                    isValid = false;
            }
            return isValid;
        }
        function VerifyFileNameAndFileSizeU() {
            var file = document.getElementById('GetFileU').files[0];
            if (file != null) {
                var fileName = file.name;
                if (fileIsValidU(fileName) == false) {
                    validasi('Format bukan gambar!', 'warning');
                    document.getElementById('GetFileU').value = null;
                    return false;
                }
                var content;
                var size = file.size;
                if ((size != null) && ((size / (1024 * 1024)) > 3)) {
                    validasi('Ukuran Maximum 1 MB', 'warning');
                    document.getElementById('GetFileU').value = null;
                    return false;
                }
                var ext = fileName.match(/\.([^\.]+)$/)[1];
                ext = ext.toLowerCase();
                // $(".custom-file-label").addClass("selected").html(file.name);
                document.getElementById('outputImgU').src = window.URL.createObjectURL(file);
                return true;
            } else
                return false;
        }
    </script>
@endsection
