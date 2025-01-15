@extends('index')
@section('content')

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div> <!-- End Page Title -->

<div class="gridDash grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
    <a href="/kriteria" class="card-linkDash">
        <div class="cardDash border-blue-500">
            <span class="card-titleDash">Data Kriteria
                <i class="bi bi-box card-iconDash"></i></span>
        </div>
    </a>
    <a href="/alternatif" class="card-linkDash">
        <div class="cardDash border-green-500">
            <span class="card-titleDash">Data Alternatif
                <i class="bi bi-person-lines-fill card-iconDash"></i></span>
        </div>
    </a>
    <a href="/penilaian" class="card-linkDash">
        <div class="cardDash border-gray-500">
            <span class="card-titleDash">Data Penilaian
                <i class="bi bi-pencil card-iconDash"></i></span>
        </div>
    </a>
    <a href="/update-fuzzy" class="card-linkDash">
        <div class="cardDash border-yellow-500">
            <span class="card-titleDash">Data Perhitungan
                <i class="bi bi-calculator card-iconDash"></i></span>
        </div>
    </a>
</div>

@endsection