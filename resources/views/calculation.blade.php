@extends('index')
@section('content')

<div class="pagetitle">
    <h1>Data Perhitungan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Data Perhitungan</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="sectionPer">
    <div class="row">
        <div class="col-lg-12">

            <!-- Table Data Penilaian -->
            <div class="cardPer">
                <div class="card-headerPer">
                    <h5 class="card-titlePer">Data Penilaian</h5>
                </div>
                <div class="card-bodyPer">
                    <table class="table datatable" id="tablePer1">
                        <thead>
                            <tr>
                                <th>Symbol</th>
                                <th>Nama</th>
                                @foreach ($kriterias as $item)
                                <th>{{$item->symbol}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alternatifs as $alternatif)
                            <tr>
                                <td>{{ $alternatif->symbol }}</td>
                                <td>{{ $alternatif->name }}</td>
                                @foreach ($kriterias as $kriteria)
                                @php
                                $nilai = $penilaians->where('alternatif_id', $alternatif->id)
                                ->where('kriteria_id', $kriteria->id)
                                ->first();
                                @endphp
                                <td>{{ $nilai ? $nilai->nilai : '-' }}</td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Table Data Penilaian -->

            <!-- Table Fuzzy -->
            <div class="cardPer">
                <div class="card-headerPer">
                    <h5 class="card-titlePer">Min/Max Sebelum Fuzzy</h5>
                </div>
                <div class="card-bodyPer">
                    <table class="table datatable" id="tablePer1">
                        <thead>
                            <tr>
                                <th> </th>
                                @foreach ($kriterias as $kriteria)
                                <th>{{$kriteria->symbol}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>a</td>
                                @foreach ($kriterias as $kriteria)
                                <td>
                                    @php
                                    // Cari nilai fuzzy berdasarkan kriteria_id
                                    $fuzzy = $fuzzys->where('kriteria_id', $kriteria->id)->first();
                                    @endphp
                                    @if ($fuzzy)
                                    {{ $fuzzy->a }}
                                    <!-- Menampilkan nilai a -->
                                    @else
                                    -
                                    <!-- Jika tidak ada data fuzzy untuk kriteria ini -->
                                    @endif
                                </td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>b</td>
                                @foreach ($kriterias as $kriteria)
                                <td>
                                    @php
                                    // Cari nilai fuzzy berdasarkan kriteria_id
                                    $fuzzy = $fuzzys->where('kriteria_id', $kriteria->id)->first();
                                    @endphp
                                    @if ($fuzzy)
                                    {{ $fuzzy->b }}
                                    <!-- Menampilkan nilai b -->
                                    @else
                                    -
                                    <!-- Jika tidak ada data fuzzy untuk kriteria ini -->
                                    @endif
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Table Fuzzy -->

            <!-- Table Fuzzyfication -->
            <div class="cardPer">
                <div class="card-headerPer">
                    <h5 class="card-titlePer">Data Setelah Fuzzy</h5>
                </div>
                <div class="card-bodyPer">
                    <table class="table datatable" id="tablePer1">
                        <thead>
                            <tr>
                                <th>Nama Alternatif</th>
                                @foreach ($kriterias as $kriteria)
                                <th>{{ $kriteria->symbol }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alternatifs as $alternatif)
                            <tr>
                                <td>{{ $alternatif->name }}</td>
                                @foreach ($kriterias as $kriteria)
                                @php
                                // Ambil data fuzzy berdasarkan alternatif dan kriteria
                                $dataFuzzy = $datafuzzys->firstWhere(function ($data) use ($alternatif, $kriteria) {
                                return $data->penilaian->alternatif_id == $alternatif->id &&
                                $data->penilaian->kriteria_id == $kriteria->id;
                                });
                                @endphp
                                <td>
                                    @if ($dataFuzzy)
                                    {{ $dataFuzzy->nilai_fuzzy }}
                                    @else
                                    N/A
                                    @endif
                                </td>
                                @endforeach
                            </tr>
                            @endforeach

                            <tr>
                                <td>MIN / MAX</td>
                                @foreach ($kriterias as $kriteria)
                                @php
                                // Cari nilai_min_max berdasarkan kriteria_id
                                $fuzzyResult = $fuzzyresults->firstWhere('kriteria_id', $kriteria->id);
                                @endphp
                                <td>
                                    {{ $fuzzyResult ? $fuzzyResult->nilai_min_max : 'N/A' }}
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Table Fuzzyfication -->

            <!-- Table Matriks Keputusan -->
            <div class="cardPer">
                <div class="card-headerPer">
                    <h5 class="card-titlePer">Matriks Keputusan</h5>
                </div>
                <div class="card-bodyPer">
                    <table class="table datatable" id="tablePer2">
                        <thead>
                            <tr>
                                <th> </th>
                                @foreach ($kriterias as $item)
                                <th>{{$item->symbol}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alternatifs as $alternatif)
                            <tr>
                                <td>{{ $alternatif->name }}</td>
                                @foreach ($kriterias as $kriteria)
                                @php
                                // Cari nilai matriks berdasarkan alternatif dan kriteria
                                $perhitungan = $perhitungans->firstWhere(function ($data) use ($alternatif, $kriteria) {
                                return $data->alternatif_id == $alternatif->id &&
                                $data->kriteria_id == $kriteria->id;
                                });
                                @endphp
                                <td>
                                    @if ($perhitungan)
                                    {{ $perhitungan->nilai_matriks }}
                                    @else
                                    N/A
                                    @endif
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Table Matriks Keputusan -->

            <!-- Table Bobot Preferensi -->
            <div class="cardPer">
                <div class="card-headerPer">
                    <h5 class="card-titlePer">Bobot Preferensi (W)</h5>
                </div>
                <div class="card-bodyPer">
                    <table class="table datatable" id="tablePer2">
                        <thead>
                            <tr>
                                @foreach ($kriterias as $item)
                                <th>{{$item->symbol}} ({{$item->attribute}})</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($kriterias as $item)
                                <td>{{$item->weight}}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Table Bobot Preferensi -->

            <!-- Table Nilai Preferensi -->
            <div class="cardPer">
                <div class="card-headerPer">
                    <h5 class="card-titlePer">Nilai Preferensi</h5>
                </div>
                <div class="card-bodyPer">
                    <table class="table datatable" id="tablePer2">
                        <thead>
                            <tr>
                                <th> </th>
                                @foreach ($kriterias as $item)
                                <th>{{$item->symbol}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alternatifs as $alternatif)
                            <tr>
                                <td>{{ $alternatif->name }}</td>
                                @foreach ($kriterias as $kriteria)
                                @php
                                // Cari nilai preferensi berdasarkan alternatif dan kriteria
                                $preferensi = $preferensis->firstWhere(function ($data) use ($alternatif, $kriteria) {
                                return $data->alternatif_id == $alternatif->id &&
                                $data->kriteria_id == $kriteria->id;
                                });
                                @endphp
                                <td>
                                    @if ($preferensi)
                                    {{ $preferensi->nilai_preferensi }}
                                    @else
                                    N/A
                                    @endif
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Table Nilai Preferensi -->

            <!-- Table Perangkingan -->
            <div class="cardPer">
                <div class="card-headerPer">
                    <h5 class="card-titlePer">Perangkingan</h5>
                </div>
                <div class="card-bodyPer">
                    <table class="table datatable" id="tablePer2">
                        <thead>
                            <tr>
                                <th>Alternatif</th>
                                <th>Total Preferensi</th>
                                <th>Ranking</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            // Array untuk menyimpan total preferensi per alternatif
                            $rankingData = [];
                            @endphp
                            @foreach ($alternatifs as $alternatif)
                            @php
                            $totalPreferensi = 0;

                            // Hitung total preferensi untuk alternatif ini
                            foreach ($kriterias as $kriteria) {
                            $preferensi = $preferensis->firstWhere(function ($data) use ($alternatif, $kriteria) {
                            return $data->alternatif_id == $alternatif->id &&
                            $data->kriteria_id == $kriteria->id;
                            });
                            $nilai = $preferensi ? $preferensi->nilai_preferensi : 0;
                            $totalPreferensi += $nilai;
                            }

                            // Simpan data ke array ranking
                            $rankingData[] = [
                            'name' => $alternatif->name,
                            'total' => $totalPreferensi,
                            ];
                            @endphp
                            @endforeach

                            @php
                            // Urutkan data berdasarkan total preferensi (descending)
                            usort($rankingData, function ($a, $b) {
                            return $b['total'] <=> $a['total'];
                                });

                                // Tambahkan ranking dengan menghindari duplikasi
                                $seen = [];
                                $ranking = 1;
                                @endphp

                                @foreach ($rankingData as $item)
                                @if (!in_array($item['name'], $seen))
                                <tr>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ number_format($item['total'], 10) }}</td>
                                    <td>{{ $ranking }}</td>
                                </tr>
                                @php
                                $seen[] = $item['name']; // Tandai alternatif sebagai sudah ditampilkan
                                $ranking++;
                                @endphp
                                @endif
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Table Perangkingan -->

        </div>
    </div>
</section>

@endsection