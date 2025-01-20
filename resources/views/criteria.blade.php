@extends('index')
@section('content')

<div class="pagetitle">
    <h1>Data Kriteria</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Data Kriteri</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="sectionKri">
    <div class="row">
        <div class="col-lg-12">
            <div class="cardKri">
                <div class="card-headerKri">
                    <h5 class="card-titleKri">Daftar Data Kriteria</h5>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#tambahDataKriteria">
                        Tambah Data
                    </button>
                </div>
                <div class="card-bodyKri">
                    <!-- Table with stripped rows -->
                    <table class="table datatable" id="tableKri">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Kriteria</th>
                                <th>Nama Kriteria</th>
                                <th>Bobot</th>
                                <th>Atribut</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($kriterias as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->symbol}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->weight}}</td>
                                <td>
                                    <option>{{$item->attribute}}</option>
                                </td>
                                <td>
                                    <a href="#" class="action-btn action-btn-edit" data-bs-toggle="modal"
                                        data-bs-target="#editDataKriteria{{$item->id}}">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('kriteria.destroy', $item->id) }}" method="POST"
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
<div class="modal fade" id="tambahDataKriteria" tabindex="-1" aria-labelledby="tambahDataKriteriaLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataKriteriaLabel">Tambah Kriteria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kriteria.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="symbol" class="form-label">Simbol Kriteria</label>
                        <input type="text" class="form-control" id="symbol" name="symbol" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kriteria</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label">Bobot</label>
                        <input type="text" class="form-control bobot-input" id="weight" name="weight" required>
                    </div>
                    <div class="mb-3">
                        <label for="atrribute" class="form-label">Atribut</label>
                        <select class="form-control" id="attribute" name="attribute" required>
                            <option selected value="" disabled>Pilih Atribut</option>
                            <option value="cost">Cost</option>
                            <option value="benefit">Benefit</option>
                        </select>
                    </div>
                    <div id="bobotWarningTambah" class="text-danger" style="display: none;"></div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Data Modal -->
@foreach ($kriterias as $item)
<div class="modal fade" id="editDataKriteria{{$item->id}}" tabindex="-1" aria-labelledby="editDataKriteriaLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataKriteriaLabel">Edit Kriteria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kriteria.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="symbol" class="form-label">Simbol Kriteria</label>
                        <input type="text" class="form-control" id="symbol" name="symbol" value="{{ $item->symbol }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kriteria</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label">Bobot</label>
                        <input type="text" class="form-control" id="weight" name="weight" value="{{ $item->weight }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="atrribute" class="form-label">Atribut</label>
                        <select class="form-control" id="attribute" name="attribute" required>
                            <option selected value="" disabled>Pilih Atribut</option>
                            <option value="cost" {{ $item->attribute == 'cost' ? 'selected' : '' }}>Cost</option>
                            <option value="benefit" {{ $item->attribute == 'benefit' ? 'selected' : '' }}>Benefit
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<script>
function validateTotalBobot(modalId) {
    let totalBobot = 0;
    let warningElement = document.getElementById(`bobotWarningTambah`);

    // Mengambil semua input bobot hanya dalam modal yang sedang digunakan
    document.querySelectorAll(`#${modalId} .bobot-input`).forEach(input => {
        totalBobot += parseFloat(input.value) || 0;
    });

    if (totalBobot !== 1) {
        warningElement.innerHTML = "⚠️ Total bobot harus sama dengan 1!";
        warningElement.style.display = "block";
        return false;
    } else {
        warningElement.innerHTML = "";
        warningElement.style.display = "none";
        return true;
    }
}

// Tambahkan event listener pada modal Tambah Data
document.querySelector("#tambahDataKriteria form").addEventListener("submit", function(event) {
    if (!validateTotalBobot('tambahDataKriteria')) {
        event.preventDefault();
    }
});
</script>
@endsection