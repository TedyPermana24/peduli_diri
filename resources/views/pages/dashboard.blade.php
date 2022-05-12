@extends('layouts.master')

@section('title', 'Dashboard')

@section('alert')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                {{ session('success') }}
            </div>
        </div>
    @endif
@endsection

@section('table-header')
    <h6 class="m-0 font-weight-bold text-primary">Data Perjalanan</h6>
@endsection

@section('content')

    @if (isset($data))

        <div class="d-flex justify-content-between">
            <div>

            </div>

            <div>
                <form class="form-inline mr-auto" action="/cariPerjalanan" method="get">
                    @csrf
                    <div class="head-col">
                        <select onchange="yesnoCheck(this)" class="form-control bg-light small" type="search">
                            <option value="lokasi">Lokasi</option>
                            <option value="tanggal">Tanggal</option>
                            <option value="jam">Jam</option>
                            <option value="suhu">Suhu</option>
                        </select>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <input name="lokasi" id="iflokasi" class="form-control bg-light small" type="search"
                                placeholder="Cari Lokasi" aria-label="search">
                            <div class="input-group-append">
                                <button class="btn btn-primary" id="iflokasiBtn" type="submit"><i
                                        class="fas fa-search fa-sm"></i></button>
                            </div>
                        </div>
                        <div class="input-group">
                            <input name="tanggal" style="display:none;" id="iftanggal" class="form-control bg-light small"
                                type="date" placeholder="Cari Tanggal">
                            <div class="input-group-append">
                                <button class="btn btn-primary" style="display:none;" id="iftanggalBtn" type="submit"><i
                                        class="fas fa-search fa-sm"></i></button>
                            </div>
                        </div>
                        <div class="input-group">
                            <input name="jam" style="display:none;" id="ifjam" class="form-control bg-light small"
                                type="time" placeholder="Cari Jam">
                            <div class="input-group-append">
                                <button class="btn btn-primary" style="display:none;" id="ifjamBtn" type="submit"><i
                                        class="fas fa-search fa-sm"></i></button>
                            </div>
                        </div>
                        <div class="input-group">
                            <input name="suhu" style="display:none;" id="ifsuhu" class="form-control bg-light small"
                                type="search" placeholder="Cari Suhu">
                            <div class="input-group-append">
                                <button class="btn btn-primary" style="display:none;" id="ifsuhuBtn" type="submit"><i
                                        class="fas fa-search fa-sm"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <div class="table-responsive mt-3">
            <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                @php
                    $i = 1;
                @endphp
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Suhu</th>
                        <th>Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $page => $d)
                        <tr>
                            <td>{{ $page + $data->firstItem() }}</td>
                            <td>{{ $d->tanggal }}</td>
                            <td>{{ $d->jam }}</td>
                            <td>{{ $d->suhu }}</td>
                            <td>{{ $d->lokasi }}</td>
                            <td>
                                <a href="/edit/{{ $d->id }}" class="btn btn-outline-warning btn-sm"><i
                                        class="fas fa-pen"></i></a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal"><i
                                        class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="modal-footer bg-whitesmoke br mt-5">
                <ul class="pagination mb-0">
                    {{ $data->appends($_GET)->links('layouts.pagination') }}
                </ul>
            </div>
        </div>
    @else
        <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">Page Not Found</p>
            <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
            <a href="index.html">&larr; Back to Dashboard</a>
        </div>
    @endif

    @foreach ($data as $d)
        @include('layouts.modal')
    @endforeach
    
    <script>
        function yesnoCheck(that) {
            if (that.value == "tanggal") {

                document.getElementById('iftanggal').style.display = "block";
                document.getElementById('iftanggalBtn').style.display = "block";

                document.getElementById('iflokasi').style.display = "none";
                document.getElementById('iflokasiBtn').style.display = "none";

                document.getElementById('ifsuhu').style.display = "none";
                document.getElementById('ifsuhuBtn').style.display = "none";

                document.getElementById('ifjam').style.display = "none";
                document.getElementById('ifjamBtn').style.display = "none";


            } else if (that.value == "jam") {

                document.getElementById('iftanggal').style.display = "none";
                document.getElementById('iftanggalBtn').style.display = "none";

                document.getElementById('iflokasi').style.display = "none";
                document.getElementById('iflokasiBtn').style.display = "none";

                document.getElementById('ifsuhu').style.display = "none";
                document.getElementById('ifsuhuBtn').style.display = "none";

                document.getElementById('ifjam').style.display = "block";
                document.getElementById('ifjamBtn').style.display = "block";

            } else if (that.value == "lokasi") {

                document.getElementById('iftanggal').style.display = "none";
                document.getElementById('iftanggalBtn').style.display = "none";

                document.getElementById('iflokasi').style.display = "block";
                document.getElementById('iflokasiBtn').style.display = "block";

                document.getElementById('ifsuhu').style.display = "none";
                document.getElementById('ifsuhuBtn').style.display = "none";

                document.getElementById('ifjam').style.display = "none";
                document.getElementById('ifjamBtn').style.display = "none";

            } else {

                document.getElementById('iftanggal').style.display = "none";
                document.getElementById('iftanggalBtn').style.display = "none";

                document.getElementById('iflokasi').style.display = "none";
                document.getElementById('iflokasiBtn').style.display = "none";

                document.getElementById('ifsuhu').style.display = "block";
                document.getElementById('ifsuhuBtn').style.display = "block";

                document.getElementById('ifjam').style.display = "none";
                document.getElementById('ifjamBtn').style.display = "none";

            }
        }
    </script>

@endsection
