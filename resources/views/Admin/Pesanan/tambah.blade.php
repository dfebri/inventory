<!-- MODAL TAMBAH -->
<div class="modal fade" data-bs-backdrop="static" id="modaldemo8">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Tambah Request</h6><button aria-label="Close" onclick="reset()" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="reqkode" class="form-label">Kode Request <span class="text-danger">*</span></label>
                            <input type="text" name="reqkode" readonly class="form-control" placeholder="">
                        </div>        
                        <div class="form-group">
                            <label for="tglrequest" class="form-label">Tanggal Request <span class="text-danger">*</span></label>
                            <input type="text" name="tglrequest" class="form-control datepicker-date" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="nama" class="form-label">User</label>
                            <input type="text" name="nama" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="divisi" class="form-label">Departement<span class="text-danger">*</span></label>
                            <input type="text" name="divisi" class="form-control" placeholder="">
                        </div>
                       <div class="form-group">
                            <label for="barang" class="form-label">Nama Barang<span class="text-danger">*</span></label>
                            <input type="text" name="barang" class="form-control" placeholder="">
                        </div>       
                        <div class="form-group">
                            <label for="jumlah" class="form-label">Quantity<span class="text-danger">*</span></label>
                            <input type="text" name="jumlah" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" placeholder="">
                        </div>   
                    </div>   
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title" class="form-label">Gambar</label>
                                <center>
                                <img src="{{url('/assets/default/barang/image.png')}}" width="80%" alt="profile-user" id="outputImg" class="">
                                </center>
                            <input class="form-control mt-5" id="GetFile" name="photo" type="file" onchange="VerifyFileNameAndFileSize()" accept=".png,.jpeg,.jpg,.svg">
                        </div>  
                    </div>                         
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary d-none" id="btnLoader" type="button" disabled="">
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
                <a href="javascript:void(0)" onclick="checkForm()" id="btnSimpan" class="btn btn-primary">Request <i class="fe fe-check"></i></a>
                <a href="javascript:void(0)" class="btn btn-light" onclick="reset()" data-bs-dismiss="modal">Batal <i class="fe fe-x"></i></a>
            </div>
        </div>
    </div>
</div>

@section('formTambahJS')
<script>
     $('input[name="kdbarang"]').keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            getbarangbyid($('input[name="kdbarang"]').val());
        }
    });

    function modalBarang() {
        $('#modalBarang').modal('show');
        $('#modaldemo8').addClass('d-none');
        $('input[name="param"]').val('tambah');
        resetValid();
        table2.ajax.reload();
    }

    function searchBarang() {
        getbarangbyid($('input[name="kdbarang"]').val());
        resetValid();
    }
    function getbarangbyid(id) {
        $("#loaderkd").removeClass('d-none');
        $.ajax({
            type: 'GET',
            url: "{{ url('admin/barang/getbarang') }}/" + id,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(data) {
                if (data.length > 0) {
                    $("#loaderkd").addClass('d-none');
                    $("#status").val("true");
                    $("#nmbarang").val(data[0].barang_nama);
                    $("#satuan").val(data[0].satuan_nama);
                    $("#jenis").val(data[0].jenisbarang_nama);
                } else {
                    $("#loaderkd").addClass('d-none');
                    $("#status").val("false");
                    $("#nmbarang").val('');
                    $("#satuan").val('');
                    $("#jenis").val('');
                }
            }
        });
    }
       

    function checkForm(){
        const reqkode = $("input[name = 'reqkode']").val();
        const tglrequest = $("input[name= 'tglrequest']").val();
        const divisi = $("input[name= 'divisi']").val();
        const jumlah = $("input[name= 'jumlah']").val();

        if(reqkode == ""){
            validasi('Kode Request wajib di isi!', 'warning');
            $("input[name='reqkode']").addClass('is-invalid');
            setLoading(false);
            return(false);     
        }else if(tglrequest == ""){
            validasi('Tanggal Request wajib di isi!', 'warning');
            $("input[name='tglrequest']").addClass('is-invalid');
            setLoading(false);
            return(false);
        }else if (divisi == "") {
            validasi('Departement wajib di isi!', 'warning');
            $("input[name='divisi']").addClass('is-invalid');
            setLoading(false);
            return(false);
        }else if(jumlah == "" || jumlah == "0"){
            validasi('Jumlah request wajib di isi!', 'warning');
            $("input[name='jumlah']").addClass('is-invalid');
            setLoading(false);
            return(false);  
        }else {
            submitForm();
        }
    }
    function submitForm(){
        console.log('submitForm');
        const reqkode = $("input[name='reqkode']").val();
        const tglrequest = $("input[name='tglrequest']").val();
        const nama = $("input[name='nama']").val();
        const divisi = $("input[name='divisi']").val();
        const barang = $("input[name='barang']").val();
        const jumlah = $("input[name='jumlah']").val();
        const foto = $('#GetFile')[0].files;
        var fd = new FormData();
        // var fd = new FormData();

        // //Append data
        fd.append('foto', foto[0]);
        fd.append('reqkode', reqkode);
        fd.append('tglrequest', tglrequest);
        fd.append('nama', nama);
        fd.append('divisi', divisi);
        fd.append('barang', barang);
        fd.append('jumlah', jumlah);
        $.ajax({
            type: 'POST',
            url: "{{route('order.store') }}",
            processData: false,
            contentType: false,
            dataType: 'json',
            data: fd,
            success: function(data) {
                $('#modaldemo8').modal('toggle');
                swal({
                    title: "Berhasil ditambah!",
                    type: "success"
                });
                table.ajax.reload(null, false);
                reset();
            }
        });
    }
    function resetValid() {
        $("input[name='reqkode']").removeClass('is-invalid');
        $("input[name='tglrequest']").removeClass('is-invalid');
        $("input[name='nama']").removeClass('is-invalid');
        $("input[name='divisi']").removeClass('is-invalid');
        $("input[name='barang']").removeClass('is-invalid');
        $("input[name='jumlah']").removeClass('is-invalid');
    };
    function reset() {
        resetValid();
        $("input[name='reqkode']").val('');
        $("input[name='tglrequest']").val('');
        $("input[name='nama']").val('');
        $("input[name='divisi']").val('');
        $("input[name='barang']").val('');
        $("input[name='jumlah']").val('');
        $("#outputImg").attr("src", "{{url('/assets/default/barang/image.png')}}");
        $("#GetFile").val('');
        $("#nmbarang").val('');
        $("#satuan").val('');
        $("#jenis").val('');
        $("#status").val('false');
        setLoading(false);
    }
    function setLoading(bool) {
        if (bool == true) {
            $('#btnLoader').removeClass('d-none');
            $('#btnSimpan').addClass('d-none');
        } else {
            $('#btnSimpan').removeClass('d-none');
            $('#btnLoader').addClass('d-none');
        }
    }
    function fileIsValid(fileName) {
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
    function VerifyFileNameAndFileSize() {
        var file = document.getElementById('GetFile').files[0];
        if (file != null) {
            var fileName = file.name;
            if (fileIsValid(fileName) == false) {
                validasi('Format bukan gambar!', 'warning');
                document.getElementById('GetFile').value = null;
                return false;
            }
            var content;
            var size = file.size;
            if ((size != null) && ((size / (1024 * 1024)) > 3)) {
                validasi('Ukuran Maximum 1 MB', 'warning');
                document.getElementById('GetFile').value = null;
                return false;
            }
            var ext = fileName.match(/\.([^\.]+)$/)[1];
            ext = ext.toLowerCase();
            // $(".custom-file-label").addClass("selected").html(file.name);
            document.getElementById('outputImg').src = window.URL.createObjectURL(file);
            return true;
        } else
            return false;
    }
</script>
@endsection
