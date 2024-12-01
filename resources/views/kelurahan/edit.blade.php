@extends('layouts.app')

@section('content')
    <h1>{{ isset($kelurahan) ? 'Edit' : 'Tambah' }} Kelurahan</h1>
    <form action="{{ isset($kelurahan) ? route('kelurahan.update', $kelurahan->id) : route('kelurahan.store') }}" method="POST">
        @csrf
        @if(isset($kelurahan))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="kecamatan_id">Kecamatan</label>
            <select name="kecamatan_id" id="kecamatan_id" class="form-control">
                @foreach ($kecamatan as $kec)
                    <option value="{{ $kec->id }}" {{ isset($kelurahan) && $kelurahan->kecamatan_id == $kec->id ? 'selected' : '' }}>
                        {{ $kec->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="kelurahan">Nama Kelurahan</label>
            <input type="text" name="kelurahan" id="kelurahan" class="form-control" value="{{ $kelurahan->kelurahan ?? '' }}">
        </div>
        <button type="submit" class="btn btn-success">{{ isset($kelurahan) ? 'Update' : 'Simpan' }}</button>
    </form>
@endsection
