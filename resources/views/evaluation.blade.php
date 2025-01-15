@extends('index')
@section('content')

<div class="pagetitle">
    <h1>Data Penilaian</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Data Penilaian</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="sectionPen">
    <div class="row">
        <div class="col-lg-12">
            <div class="cardPen">
                <div class="card-headerPen">
                    <h5 class="card-titlePen">Daftar Data Penilaian</h5>
                </div>
                <div class="card-bodyPen">
                    <!-- Table with stripped rows -->
                    <table class="table datatable" id="tablePen">
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
                                        data-bs-target="#editDataPenilaian{{$item->id}}">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
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

<!-- Edit Data Modal -->
@foreach ($alternatifs as $item)
<div class="modal fade" id="editDataPenilaian{{$item->id}}" tabindex="-1"
    aria-labelledby="editDataPenilaianLabel{{$item->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataPenilaianLabel">Edit Penilaian - {{ $item->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('penilaian.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="alternatif_id" value="{{ $item->id }}">

                    @foreach ($kriterias as $kriteria)
                    <div class="mb-3">
                        <label for="kriteria_{{ $kriteria->id }}" class="form-label">{{ $kriteria->name }}</label>
                        <input type="number" class="form-control" id="nilai{{ $kriteria->id }}" name="nilai[]"
                            value="{{ optional($penilaians->where('alternatif_id', $item->id)->where('kriteria_id', $kriteria->id)->first())->nilai }}">
                        <input type="hidden" name="kriteria_id[]" value="{{ $kriteria->id }}">
                    </div>
                    @endforeach

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endforeach
@endsection