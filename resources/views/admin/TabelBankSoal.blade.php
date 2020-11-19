@extends('admin/layout/home')


@section('body')

    <div class="container-fluid overflow-auto">
        <div class="clearfix">
            <h1 class="text-secondary float-left">DATA SOAL</h1>
        </div>

        <div class="row">
            <!-- Button Create trigger modal -->
            <div class="col-12 col-sm mb-3">
                <button type="button" class="btn btn-success text-white mr-2" data-toggle="modal" data-target="#create-form">
                    Create Data Soal
                </button>
            </div>
    
            {{-- Searching --}}
            <div class="col-12 col-sm mb-3">
                <div class="input-group">
                    <input type="text" class="search form-control rounded-left" placeholder="Cari nama soal..."
                        aria-label="Searching" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- table --}}
        <div class="table">
            <table class="shadow" cellpadding="10" width="100%">
                <tr class="bg-primary text-white">
                    <th>Matakuliah</th>
                    <th>Semester</th>
                    <th>Type</th>
                    <th>Url</th>
                    <th>Action</th>
                </tr>
                @foreach ($RecordSoal as $soal)
                    <tr class="baris">
                        <td class="matakuliah">{{ $soal->matakuliah }}</td>
                        <td class="semester">{{ $soal->semester }}</td>
                        <td class="type">{{ $soal->type }}</td>
                        <td class="url">{{ $soal->url }}</td>
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
    {{-- container fluid end --}}

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
                <form action="{{ route('CreateSoal') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-column">
                            <div class="form-group">
                                <label for="create-matakuliah">Matakuliah</label>
                                <input type="text" class="form-control @error('matakuliah') is-invalid @enderror"
                                    id="create-matakuliah" name="matakuliah" placeholder="Matakuliah"
                                    value="{{ old('matakuliah') }}">
                                @error('matakuliah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="create-semester">Semester</label>
                                <input type="text" class="form-control @error('semester') is-invalid @enderror"
                                    id="create-semester" name="semester" placeholder="Semester"
                                    value="{{ old('semester') }}">
                                @error('semester')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="create-type">Type</label>
                                <select class="custom-select @error('type') is-invalid @enderror" name="type"
                                    id="create-type"">
                                        <option selected>Pilih...</option>
                                        <option value=" uts" {{ old('type') == 'uts' ? 'selected' : '' }}>UTS</option>
                                    <option value="uas" {{ old('type') == 'uas' ? 'selected' : '' }}>UAS</option>
                                </select>
                                @error('type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="create-url">Url</label>
                                <input type="text" class="form-control @error('url') is-invalid @enderror" id="create-url"
                                    name="url" placeholder="URL" value="{{ old('url') }}">
                                @error('url')
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
                <form action="{{ route('UpdateSoal') }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div id="edit-soal" class="modal-body">
                        <div class="form-column">
                            <div class="form-group">
                                <label for="edit-matakuliah">Matakuliah</label>
                                <p
                                    class="edit-matakuliah border rounded p-2 @error('edit_matakuliah') is-invalid @enderror">
                                    {{ old('edit_matakuliah') }}</p>
                                @error('edit_matakuliah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <input type="hidden" class="form-control" id="edit-matakuliah" name="edit_matakuliah"
                                    value="{{ old('edit_matakuliah') }}">
                            </div>
                            <div class="form-group">
                                <label for="edit-semester">Semester</label>
                                <input type="text" class="form-control @error('edit_semester') is-invalid @enderror"
                                    id="edit-semester" name="edit_semester" value="{{ old('edit_semester') }}">
                                @error('edit_semester')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="edit-type">Type</label>
                                <select class="custom-select @error('edit_type') is-invalid @enderror" name="edit_type" id="edit-type"">
                                        <option value=" uts" {{ old('edit_type') == 'uts' ? 'selected' : '' }}>UTS</option>
                                        <option value="uas" {{ old('edit_type') == 'uas' ? 'selected' : '' }}>UAS</option>
                                </select>
                                @error('edit_type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="edit-url">URL</label>
                                <input type="text" class="form-control @error('edit_url') is-invalid @enderror"
                                    id="edit-url" name="edit_url" value="{{ old('edit_url') }}">
                                @error('edit_url')
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
                <form action="{{ route('DeleteSoal') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div id="delete-soal" class="modal-body">

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

    <script src="{{ asset('admin/assets/js/soal.js') }}"></script>
@endsection
