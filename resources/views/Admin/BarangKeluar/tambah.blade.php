<!-- MODAL TAMBAH -->
<div class="modal fade" data-bs-backdrop="static" id="modaldemo8">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Tambah Request Barang Keluar</h6><button aria-label="Close" onclick="reset()" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bkkode" class="form-label">Kode Barang Keluar <span class="text-danger">*</span></label>
                            <input type="text" name="bkkode" readonly class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="tglkeluar" class="form-label">Tanggal Request <span class="text-danger">*</span></label>
                            <input type="text" name="tglkeluar" class="form-control datepicker-date" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tujuan" class="form-label">Departement <span class="text-danger">*</span></label>
                            <!--<input type="text" name="tujuan" class="form-control" placeholder="">-->
                            <select name="tujuan" class="form-control">
                                <option value="">--- Piilh Dept. ---</option>
                                    <option>HRGA</option>
                                    <option>Operation</option>
                                    <!-- <option>Commercial</option> -->
                                    <!-- <option>SCM</option> -->
                                    <option>Finance</option>
                                    <option>Tax</option>
                                    <option>Sales</option>
                                    <!-- <option>KPG</option>
                                    <option>BPIC</option> -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user" class="form-label">Nama <span class="text-danger">*</span></label>
                            <input type="text" name="user" class="form-control" placeholder="">
                        </div>
                    </div>
                </div>
            
                <div class="row" id="formContainer">  
                    <div class="col-md-6 form-group-wrapper" id="form-groupe-0">
                        <div class="form-group">
                            <label>Kode Barang<span class="text-danger me-1">*</span>
                                <input type="hidden" id="status" value="false">
                                <div class="spinner-border spinner-border-sm d-none" id="loaderkd" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="addBarang0" name="kdbarang[]" placeholder="" data-index="0" readonly>
                                <!-- <button class="btn btn-primary-light" onclick="searchBarang(0)" type="button"><i class="fe fe-search"></i></button> -->
                                <button class="btn btn-success-light" onclick="modalBarang(0)" type="button"><i class="fe fe-box"></i></button>
                            </div>
                            <input type="hidden" class="form-control" id="barangstok" readonly>
                        </div>
                        {{-- <div class="form-group"> --}}
                            {{-- <label>Stok Barang</label> --}}
                      
                        {{-- </div> --}}
                        {{-- <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" id="nmbarang0" data-index="0" readonly>
                        </div> --}}
                        <div class="form-group">
                            <label for="jml" class="form-label">Jumlah Request <span class="text-danger">*</span></label>
                            <input type="text" name="jml[]" value="0" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/i, '').replace(/(\..*?)\..*/i, '$1').replace(/^0[^.]/, '0');" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary d-none" id="btnLoader" type="button" disabled="">
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
                <button type="button" onclick="addForm()" name="addMore" id="addMore" class="btn btn-success">Tambah barang<i class="fe fe-plus"></i></button>
                {{-- <a href="javascript:void(0)" onclick="addForm()" class="btn btn-success">Tambah barang <i class="fe fe-plus"></i></a> --}}
                <a href="javascript:void(0)" onclick="checkForm()" class="btn btn-primary">Request <i class="fe fe-check"></i></a>
                <a href="javascript:void(0)" class="btn btn-light" onclick="reset()" data-bs-dismiss="modal">Batal <i class="fe fe-x"></i></a>
            </div>
        </div>
    </div>
</div>

@section('formTambahJS')
<script>
    $('input[name="kdbarang[]"]').keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            getbarangbyid($('input[name="kdbarang[]"]').val());
        }
    });
    

    let formIndex = 1;  
    const maxForms = 11;
    function addForm() {
        const formContainer = document.getElementById('formContainer');
        const currentForms = formContainer.getElementsByClassName('form-group-wrapper').length;
        
        if(currentForms >= maxForms) {
            validasi('Maksimal 3 Barang mas e.', 'warning');
            return;
        }
        // console.log(currentForms);
        // const currentForms = formContainer.getElementsById('form-groupe-0').length;
        // const firstFormInput = document.querySelector('#form-groupe-0 input[name="kdbarang[]"]').value.trim();
        
        // if (currentForms > 0 && !firstFormInput) {
        //     alert('Kode Barang pertama harus diisi terlebih dahulu.');
        //     return;
        // }

        const allInputs = document.querySelectorAll('input[name="kdbarang[]"]');
        for (let i = 0; i < allInputs.length; i++) {
            if (allInputs[i].value.trim() === '') {
                // alert(' Kode Barang harus diisi terlebih dahulu.');
                validasi('Pilih Kode Barang terlebih dahulu!', 'warning');
                return;
            }
        }
         
        const newForm = `
            <div class="col-md-6 form-group-wrapper" id="form-groupe-${formIndex}">
                <div class="form-group">
                    <label>Kode Barang<span class="text-danger me-1">*</span>
                        <input type="hidden" id="status${formIndex}" value="false">
                        <div class="spinner-border spinner-border-sm d-none" id="loaderkd${formIndex}" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="addBarang${formIndex}" name="kdbarang[]" placeholder="" data-index="${formIndex}" readonly>
                        <button class="btn btn-success-light" onclick="modalBarang()" type="button"><i class="fe fe-box"></i></button>
                    </div>
                    <input type="hidden" class="form-control" id="barangstok" readonly>
                </div>
               
                <div class="form-group">
                    <label for="jml" class="form-label">Jumlah Request<span class="text-danger">*</span></label>
                    <input type="text" name="jml[]" value="0" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/i, '').replace(/(\\..*?)\\..*/i, '$1').replace(/^0[^.]/, '0');" placeholder="">     
                </div>         
                <button type="button" class="btn btn-danger remove" onclick="removeForm(${formIndex})">Hapus</button>
            </div>
        `;
        formContainer.insertAdjacentHTML('beforeend', newForm);
        formIndex++;
    }
    // function removeForm(index) {
    //     document.getElementById(`form-group-${index}`).remove();
    // }
    function removeForm(index) {
        const formGroup = document.getElementById(`form-groupe-${index}`);
        if (formGroup) {
            formGroup.remove();
        }
        document.getElementById('addMore').disabled = false;
    }
    function modalBarang() {
        $('#modalBarang').modal('show');
        $('#modaldemo8').addClass('d-none');
        $('input[name="param[]"]').val('tambah');
        resetValid();
        table2.ajax.reload();
    }

    function searchBarang() {
        getbarangbyid($('input[name="kdbarang[]"]').val());
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
                    $('#barangstok').val(data.totalstok);
                    $("#nmbarang").val(data.barang_nama);
                    $("#satuan").val(data.satuan_nama);
                    $("#jenis").val(data.jenisbarang_nama);
       
                } else {
                    $("#loaderkd").addClass('d-none');
                    $("#status").val("false");
                    $("#barangstok").val('');
                    $("#nmbarang").val('');
                    $("#satuan").val('');
                    $("#jenis").val('');
                }
            }
        });
    }

    function checkForm() {
        const tglkeluar = $("input[name='tglkeluar']").val();
        const status = $("#status").val();  
        const barangstok = $("#barangstok").val();
        const jml = $("input[name='jml[]']").val();
        // var_dump(barangstok)
        setLoading(true);
        resetValid();
        // var_dump(jml),
        // sumbrg = sum("barangstok");
        console.log(barangstok);
        console.log(jml);
        if (tglkeluar == "") {
            validasi('Tanggal Keluar wajib di isi!', 'warning');
            $("input[name='tglkeluar']").addClass('is-invalid');
            setLoading(false);
            return false;
        // } else if (status == "false") {
        //     validasi('Barang wajib di pilih!', 'warning');
        //     $("input[name='kdbarang[]']").addClass('is-invalid');
        //     setLoading(false);
        //     return false;
        } else if (jml == "" || jml == "0") {
            validasi('Jumlah Keluar wajib di isi!', 'warning');
            $("input[name='jml[]']").addClass('is-invalid');
            setLoading(false);
            return false;
        } else if (+barangstok < jml) {
            validasi('Stok barang tidak cukup!', 'warning');
            $("input[name='jml[]']").addClass('is-invalid');
            // $("#barangstok").addClass('is-invalid');
            setLoading(false);
            return false;
        }   
        else {
            submitForm();
        }

    }
    
    function submitForm() {

        var kdbarang = [];
        var jml = [];
        const bkkode = $("input[name='bkkode']").val();
        const tglkeluar = $("input[name='tglkeluar']").val();
        const user = $("input[name='user']").val();
        const tujuan = $("select[name='tujuan']").val();
       console.log(user);
        $("input[name='kdbarang[]']").each(function() {
            kdbarang.push(this.value);
        });

        $("input[name='jml[]']").each(function() {
            jml.push(this.value);
        });

        $.ajax({
            type: 'POST',
            url: "{{ route('barang-keluar.store') }}",
            enctype: 'multipart/form-data',
            data: {
                bkkode: bkkode,
                tglkeluar: tglkeluar,      
                tujuan: tujuan,
                user: user,
                barang: kdbarang,
                jml: jml
            },
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
        // resetAddForm();
        $("input[name='tglkeluar']").removeClass('is-invalid');
        $("input[name='kdbarang[]']").removeClass('is-invalid');
        $("select[name='tujuan']").removeClass('is-invalid');
        $("input[name='user']").removeClass('is-invalid');
        $("input[name='jml[]']").removeClass('is-invalid');
    };

    function resetAddForm() {
        formIndex = 1;
        const formContainer = document.getElementById('formContainer');
        formContainer.innerHTML = '';
        addForm();
        document.getElementById('addMore').disabled = false; 
    }
    
    function reset() {
        resetAddForm();
        resetValid();
     
        $("input[name='bkkode']").val('');
        $("input[name='kdbarang[]']").val('');
        $("input[name='tglkeluar']").val('');
        $("select[name='tujuan']").val('');
        $("input[name='user']").val('');
        $("input[name='jml[]']").val('');
        $("#nmbarang").val('');
        $("#barangstok").val('');
        $("#satuan").val('');
        $("#jenis").val('');
        $("#status").val('false');

        // $("input[name='kdbarang[]']").each(function() {
        //     $(this).val('');
        // });
        // $("input[name='jml[]']").each(function() {
        //     $(this).val('0');
        // });
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
</script>
@endsection