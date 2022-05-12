@extends('layouts.master')

@section('title', 'Input Form')

@section('table-header')
    <h6 class="m-0 font-weight-bold text-primary">Input Data Perjalanan</h6>
@endsection

@section('content')
    <form action="/inputData" method="POST">
        @csrf
        <div class="form-group">
            <label>Tanggal</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-calendar"></i>
                    </div>
                </div>
                <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror">
                @error('tanggal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
        </div>
        <div class="form-group">
            <label>Jam</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
                <input type="time" name="jam" class="form-control @error('jam') is-invalid @enderror">
                @error('jam')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
        </div>
        <div class="form-group">
            <label>Suhu</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-fire"></i>
                    </div>
                </div>
                <input type="text" name="suhu" class="form-control @error('suhu') is-invalid @enderror" placeholder="--">
                @error('suhu')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
        </div>
        <div class="form-group">
            <label>Lokasi</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-map-marker"></i>
                    </div>
                </div>
                <input type="text" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" placeholder="--">
                @error('lokasi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                 @enderror
            </div>
        </div>
        <div class="modal-footer bg-whitesmoke br mt-5">
            <button type="reset" class="btn btn-secondary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Reset</span>
            </a>
            <button type="submit" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">Simpan</span>
            </button>
        </div>
    </form>

@endsection
