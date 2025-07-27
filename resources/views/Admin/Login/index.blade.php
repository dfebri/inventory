@extends('Master.Layouts.app_login', ['title' => $title])

@section('content')

<div class="container-login50 d-flex" style="background: linear-gradient(to right, #e9eaec, #186ef7);">
    <div class="wrap-login100 p-2 w-20" style="background: rgb(255, 255, 255); border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin: auto;">
        <div class="d-flex justify-content-center align-items-center mb-2">
            @if($web->web_logo == '' || $web->web_logo == 'MGMaritim.png')
            <img src="{{url('/assets/default/web/MGMaritim.png')}}" height="75px" class="" alt="logo">
            @else
            <img src="{{asset('storage/web/' . $web->web_logo)}}" height="75px" class="" alt="logo">
            @endif
        </div>
        <div class="text-center">
            <h4 class="fw-bold text-black text-uppercase text-truncate">{{$web->web_nama}} <span class="text-gray">| LOGIN</span></h4>
        </div>
        <form class="login100-form validate-form mt-3" method="POST" name="myForm" action="{{ url('admin/proseslogin') }}" enctype="multipart/form-data" onsubmit="return validateForm()">
            @csrf
            <div class="panel panel-primary">
                <div class="panel-body tabs-menu-body p-0 pt-3">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab5">
                            <div class="wrap-input100 validate-input input-group mb-3" data-bs-validate="Valid username is required">
                                <a tabindex="-1" href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-account text-muted ms-1" aria-hidden="true"></i>
                                </a>
                                <input name="user" value="{{Session::get('userInput')}}" class="input100 border-start-0 form-control ms-0" type="text" placeholder="Username" autocomplete="on">
                            </div>
                            <div class="wrap-input100 validate-input input-group mb-4" id="Password-toggle">
                                <a tabindex="-1" href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                </a>
                                <input name="pwd" class="input100 border-start-0 form-control ms-0" type="password" placeholder="Password" autocomplete="off">
                            </div>
                            <div class="container-login100-form-btn">
                                <button type="button" class="login100-form-btn btn btn-primary d-none" id="btnLoader" type="button" disabled="">
                                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                                    Loading...
                                </button>
                                <button type="submit" class="login100-form-btn btn btn-blue" id="btnLogin">Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- <marquee>Kamu jangan lupa makan yah! &#128522</marquee> -->
        </form>
    </div>
    <div class="w-50 d-flex justify-content-center">
        <img src="{{url('/assets/images/brand/ATK10.jpg')}}" class="img-fluid vh-100" alt="side image" style="object-fit: cover; width: 100%; border-radius: 3px; margin: auto;">
    </div>
</div>

@endsection

@section('scripts')

<script>
    function validateForm() {
        var usr = document.forms["myForm"]["user"].value;
        var pwd = document.forms["myForm"]["pwd"].value;

        setLoading(true);

        if (usr == "") {
            validasi('Username Masih Kosong!', 'warning');
            setLoading(false);
            return false;
        } else if (pwd == '') {
            validasi('Password Masih Kosong!', 'warning');
            setLoading(false);
            return false;
        }
    }


    function setLoading(bool){
        if(bool == true){
            $('#btnLoader').removeClass('d-none');
            $('#btnLogin').addClass('d-none');
        }else{
            $('#btnLogin').removeClass('d-none');
            $('#btnLoader').addClass('d-none');
        }
    }

    function validasi(judul, status) {
        swal({
            title: judul,
            type: status,
            confirmButtonText: "OK"
        });
    }
</script>

@endsection