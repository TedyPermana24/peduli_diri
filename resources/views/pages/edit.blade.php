@extends('layouts.master')

@section('title', 'Edit Form')

@section('table-header')
    <h6 class="m-0 font-weight-bold text-primary">Edit Data Perjalanan</h6>
@endsection

@section('content')
    <form action="/update/{{$data->id}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Tanggal</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-calendar"></i>
                    </div>
                </div>
                <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{$data->tanggal}}" placeholder="--">
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
                <input type="time" name="jam" class="form-control @error('jam') is-invalid @enderror" value="{{$data->jam}}" placeholder="--">
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
                <input type="text" name="suhu" class="form-control @error('suhu') is-invalid @enderror" value="{{$data->suhu}}">
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
                <input type="text" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" value="{{$data->lokasi}}">
                @error('lokasi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                 @enderror
            </div>
        </div>
        <div class="modal-footer bg-whitesmoke br mt-5">
            <button type="submit" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">Update</span>
            </button>
        </div>
    </form>

@endsection
