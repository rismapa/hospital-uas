@extends('layouts.main')

@section('content')

  
  <div class="form my-3 mx-auto text-center p-3">
    <h3 class="mb-5 fw-semibold">Tambah Data Poliklinik</h3>
    <form action="{{ route('polyclinic.store') }}" method="POST">
      @csrf
      <div class="mb-4">
        <input type="text" name="name" class="form-control @error('name') border-danger @enderror"" id="name" placeholder="Nama Poli..." value="{{ old('name') }}">
      </div>
      
      
      <div class="form-group mb-3">
        <input type="submit" value="Simpan" class="btn btn-success w-100">
      </div>
    </form>

    @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
        <div class="text-danger">
          {{ $error }}
        </div>
      @endforeach
    @endif
  </div>
@endsection