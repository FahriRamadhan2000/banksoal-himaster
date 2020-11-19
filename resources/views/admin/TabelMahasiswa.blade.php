@extends('admin/layout/home')


@section('body')

    <div class="container-fluid overflow-auto">
        <div class="clearfix">
            <h1 class="text-secondary float-left">DATA MAHASISWA</h1>
        </div>

        <div class="row">
            <!-- Button Create trigger modal -->
            <div class="col-12 col-sm mb-3">
                <button type="button" class="btn btn-success text-white mr-2" data-toggle="modal" data-target="#create-form">
                    Create Data Mahasiswa
                </button>
            </div>
            {{-- Searching --}}
            <div class="col-12 col-sm mb-3">
                <div class="input-group">
                    <input type="text" class="search form-control rounded-left" placeholder="Cari Nama Mahasiswa..."
                        aria-label="Searching" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- tabel --}}
        <div class="table">
            <table class="shadow" cellpadding="10" width="100%">
                <tr class="bg-primary rounded-top text-white">
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Angkatan</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
                @foreach ($RecordMahasiswa as $mahasiswa)
                    <tr class="baris">
                        <td class="nama">{{ $mahasiswa->nama }}</td>
                        <td class="nim">{{ $mahasiswa->nim }}</td>
                        <td class="angkatan">{{ $mahasiswa->angkatan }}</td>
                        <td class="password">{{ $mahasiswa->password }}</td>
                        <td>
                            <div class="action d-flex">


                                <!-- Button Edit trigger modal -->
                                <button type="button" class="edit-button btn btn-warning text-white mr-2"
                                    data-toggle="modal" data-target="#edit-form">
                                    Edit
                                </button>


                                <!-- Button Delete trigger modal -->
                                <button type="button" class="delete-button btn btn-danger text-white" data-toggle="modal"
                                    data-target="#delete-form">
                                    Delete
                                </button>


                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <!-- Modal to Create -->
    <div class="modal fade" id="create-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-success" id="exampleModalLongTitle">Create Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('CreateMahasiswa') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-column">
                            <div class="form-group">
                                <label for="create-nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="create-nama"
                                    name="nama" placeholder="Nama" value="{{ old('nama') }}">
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="create-nim">Nim</label>
                                <input type="text" class="form-control @error('nim') is-invalid @enderror" id="create-nim"
                                    name="nim" placeholder="NIM" value="{{ old('nim') }}">
                                @error('nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="create-angkatan">Angkatan</label>
                                <input type="text" class="form-control @error('angkatan') is-invalid @enderror"
                                    id="create-angkatan" name="angkatan" placeholder="Angkatan"
                                    value="{{ old('angkatan') }}">
                                @error('angkatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="create-password">Password</label>
                                <input type="text" class="form-control @error('password') is-invalid @enderror"
                                    id="create-password" name="password" placeholder="Password"
                                    value="{{ old('password') }}">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- modal-body-end -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                        <button type="submit" class="btn btn-primary">Create Data</button>
                    </div>
                    <!-- modal-footer-end -->
                </form>
            </div>
            <!-- modal-content-end -->
        </div>
        <!-- modal-dialog-end -->
    </div>
    <!-- End Modal -->

    <!-- Modal to Edit -->
    <div class="modal fade" id="edit-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-warning" id="exampleModalLongTitle">Edit Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('UpdateMahasiswa') }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div id="edit-mahasiswa" class="modal-body">
                        <div class="form-column">
                            <div class="form-group">
                                <label for="edit-nama">Nama</label>
                                <input type="text" class="form-control @error('edit_nama') is-invalid @enderror"
                                    id="edit-nama" name="edit_nama" value="{{ old('edit_nama') }}">
                                @error('edit_nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="edit-nim">Nim</label>
                                <p class="edit-nim border rounded p-2 @error('edit_nim') is-invalid @enderror">
                                    {{ old('edit_nim') }}</p>
                                @error('edit_nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <input type="hidden" class="form-control" id="edit-nim" name="edit_nim"
                                    value="{{ old('edit_nim') }}">
                            </div>
                            <div class="form-group">
                                <label for="edit-angkatan">Angkatan</label>
                                <input type="text" class="form-control @error('edit_angkatan') is-invalid @enderror"
                                    id="edit-angkatan" name="edit_angkatan" value="{{ old('edit_angkatan') }}">
                                @error('angkatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="edit-password">Password</label>
                                <input type="text" class="form-control @error('edit_password') is-invalid @enderror"
                                    id="edit-password" name="edit_password" value="{{ old('edit_password') }}">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- modal-body-end -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-warning text-white">Save changes</button>
                    </div>
                    <!-- modal-footer-end -->
                </form>
            </div>
            <!-- modal-content-end -->
        </div>
        <!-- modal-dialog-end -->
    </div>
    <!-- End Modal -->

    <!-- Modal to Delete -->
    <div class="modal fade" id="delete-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger" id="exampleModalLongTitle">Delete Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('DeleteMahasiswa') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div id="delete-mahasiswa" class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </div>
                </form>
            </div>
            <!-- modal-content End -->
        </div>
        <!-- modal-dialog-end  -->
    </div>
    <!-- modal-end -->

    <script src="{{ asset('admin/assets/js/mahasiswa.js') }}"></script>
@endsection
