@extends('index')
@section('content')

<div class="pagetitle">
    <h1>Data Alternatif</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Data Alternatif</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="sectionAlt">
    <div class="row">
        <div class="col-lg-12">
            <div class="cardALt">
                <div class="card-headerALt">
                    <h5 class="card-titleALt">Daftar Data Alternatif</h5>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#tambahDataModal">
                        Tambah Data
                    </button>

                </div>
                <div class="card-bodyALt">
                    <!-- Table with stripped rows -->
                    <table class="table datatable" id="tableAlt">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Alternatif</th>
                                <th>Nama Alternatif</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($alternatifs as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->symbol}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    <a href="#" class="action-btn action-btn-edit" data-bs-toggle="modal"
                                        data-bs-target="#editDataModal{{$item->id}}">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('alternatif.destroy', $item->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn action-btn-delete">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tambah Data Modal -->
<div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataModalLabel">Tambah Alternatif</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('alternatif.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="symbol" class="form-label">Simbol Alternatif</label>
                        <input type="text" class="form-control" id="symbol" name="symbol" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Alternatif</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Data Modal -->
@foreach ($alternatifs as $item)
<div class="modal fade" id="editDataModal{{$item->id}}" tabindex="-1" aria-labelledby="editDataModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataModalLabel">Edit Alternatif</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('alternatif.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="symbol" class="form-label">Simbol Alternatif</label>
                        <input type="text" class="form-control" id="symbol" name="symbol" value="{{ $item->symbol }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Alternatif</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection