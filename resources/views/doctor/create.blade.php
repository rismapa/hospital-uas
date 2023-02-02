@extends('layouts.main')

@section('content')

  
  <div class="form my-3 mx-auto text-center p-3">
    <h3 class="mb-5 fw-semibold">Tambah Data Dokter</h3>
    <form action="{{ route('doctor.store') }}" method="POST" class="text-start">
      @csrf
      <div class="mb-4">
        <label for="name" class="form-label"><small>Nama Dokter</small></label>
        <input type="text" name="name" class="form-control @error('name') border-danger @enderror" id="name" placeholder="Masukan Nama Dokter" value="{{ old('name') }}">
        @error('name')
          <div class="text-danger">
            <small>{{ $message }}</small>
          </div>              
        @enderror
      </div>
      <div class="mb-4">
        <label for="name" class="form-label"><small>Pilih Poli</small></label>
        <select name="polyclinic_id" class="form-select @error('polyclinic_id') border-danger @enderror">
          <option selected disabled>Pilih Poli</option>
          @foreach ($polis as $poli)
            <option value={{ $poli->id }}>{{ $poli->name }}</option>              
          @endforeach
        </select>
        @error('polyclinic_id')
          <div class="text-danger">
            <small>{{ $message }}</small>
          </div>              
        @enderror
      </div>      
      
      <div class="form-group mb-3">
        <input type="submit" value="Simpan" class="btn btn-success w-100">
      </div>
    </form>
  </div>
@endsection