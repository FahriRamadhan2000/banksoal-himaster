<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="Bank Soal" content="Bank Soal Keilmuan HIMASTER">
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Custom fonts for this template-->
    <link href={{ asset('admin/assets/vendor/fontawesome-free/css/all.min.css') }} rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href={{ asset('admin/assets/css/sb-admin-2.min.css') }} rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <title>Document</title>
</head>
<title>Bank Soal Keilmuan HIMASTER</title>

<body class="bg-light">

    {{-- top --}}
    <div class="top d-flex align-items-center" id="page-top">
        <div class="col-6 mx-auto text-center text-white">
            <h1>Bank Soal</h1>
            <p>Tersimpan materi-materi yang membantu mahasiswa menghadapi ujian</p>
        </div>
    </div>
    <div class="body col-11 col-md-8 mx-auto p-5 mb-5 shadow">
        <div class="d-flex justify-content-end mb-5">
            <h3 class="mb-2 text-secondary">
                Hai, {{ Auth::user()->nama }}
            </h3>
            @if (Auth::user()->nim == "H10511810100")    
            <div class="admin ml-3">
                <form class="p-0" action="{{ route('admin') }}" method="get">
                    @csrf
                    <button class="btn btn-info" type="submit">
                        Admin
                    </button>
                </form>
            </div>
            @endif
            <!-- user logout -->
            <div class="logout ml-3">
                <form class="p-0" action="{{ route('logout') }}" method="post">
                    @method('post')
                    @csrf
                    <button class="btn btn-warning" type="submit">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- searching -->
        <div class="searching mb-3">
            <input class="form-control" type="text" name="" id="" placeholder="Cari Matakuliah Disini..."
                autocomplete="off">
        </div>

        <!-- show banksoal -->
        <div class="banksoal">
            @foreach ($banks as $bank)

                <!-- Button BankSoal trigger modal -->
                <button type="button" class="btn btn-primary text-white mb-3" data-toggle="modal"
                    data-target="#show-{{ $bank->id }}">
                    {{ $bank->matakuliah }} ( {{ $bank->type }})
                </button>

                <!-- Modal to Banksoal -->
                <div class="modal fade" id="show-{{ $bank->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-secondary" id="exampleModalLongTitle">
                                    {{ $bank->matakuliah }} ( {{ $bank->type }}) </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-secondary">
                                Apakah anda yakin ingin download soal ini?
                            </div>
                            <div class="modal-footer d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary mr-3"
                                    data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary"
                                    href="download/{{ $bank->matakuliah }}/{{ Auth::user()->nim }}"
                                    target="_blank">Download</a>
                            </div>
                        </div>
                        <!-- modal-content End -->
                    </div>
                    <!-- modal-dialog-end  -->
                </div>
                <!-- modal-end -->
            @endforeach
        </div>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src={{ asset('admin/assets/vendor/jquery/jquery.min.js') }}></script>
    <script src={{ asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}></script>

    <!-- Core plugin JavaScript-->
    <script src={{ asset('admin/assets/vendor/jquery-easing/jquery.easing.min.js') }}></script>

    <!-- Custom scripts for all pages-->
    <script src={{ asset('admin/assets/js/sb-admin-2.min.js') }}></script>
    <script src={{ asset('assets/js/main.js') }}></script>
</body>

</html>
