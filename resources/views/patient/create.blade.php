@extends('layouts.main')

@section('content')

  
  <div class="form my-3 mx-auto text-center p-3">
    <h3 class="mb-5 fw-semibold">Tambah Data Pasien</h3>
    <form action="{{ route('patient.store') }}" method="POST" class="text-start">
      @csrf
      <div class="mb-4">
        <label for="name" class="form-label"><small>Nama Pasien</small></label>
        <input type="text" name="name" class="form-control @error('name') border-danger @enderror" id="name" placeholder="Masukan Nama Pasien" value="{{ old('name') }}">
        @error('name')
          <div class="text-danger">
            <small>{{ $message }}</small>
          </div>              
        @enderror
      </div>
      <div class="mb-4">
        <label for="birthdate" class="form-label"><small>Tanggal Lahir</small></label>
        <input type="date" name="birthdate" class="form-control @error('birthdate') border-danger @enderror" id="birthdate" value="{{ old('birthdate') }}">
        @error('birthdate')
          <div class="text-danger">
            <small>{{ $message }}</small>
          </div>              
        @enderror
      </div>
      <div class="mb-4">
        <label for="birthdate" class="form-label"><small>Jenis Kelamin</small></label>
        <select name="gender" id="gender" class="form-select @error('gender') border-danger @enderror">
          <option selected disabled>Pilih Jenis Kelamin</option>
          <option value="P">Pria</option>
          <option value="W">Wanita</option>
        </select>
        @error('gender')
          <div class="text-danger">
            <small>{{ $message }}</small>
          </div>              
        @enderror
      </div>      
      <div class="mb-4">
        <label for="polyclinic_id" class="form-label"><small>Pilih Poliklinik</small></label>
        <select name="polyclinic_id" id="polyclinic_id" class="form-select @error('polyclinic_id') border-danger @enderror">
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
      <div class="mb-4">
        <label for="doctor_id" class="form-label"><small>Pilih Dokter</small></label>
        <select name="doctor_id" id="doctor_id" class="form-select @error('doctor_id') border-danger @enderror" disabled>
          <option selected disabled>Pilih Poli Terlebih Dahulu</option>
        </select>
        @error('doctor_id')
          <div class="text-danger">
            <small>{{ $message }}</small>
          </div>              
        @enderror
      </div>      
      {{-- <input type="text" name="doctor_code" id="doctor_code" hidden> --}}
      
      <div class="form-group mb-3">
        <input type="submit" value="Simpan" class="btn btn-success w-100">
      </div>
    </form>
  </div>
@endsection

@section('getDoctor')
    <script>
      $(document).ready(function() {
        $('#polyclinic_id').on('change', function() {
          var polyID = $(this).val()

          if (polyID) {
            $.ajax({
              url: '/patient/get-doctor/'+polyID,
              type: "GET",
              data : {"_token":"{{ csrf_token() }}"},
              dataType: "json",
              success: function(data) {
                if(data) {
                  $('#doctor_id').empty()
                  $('#doctor_id').append('<option selected disabled>Pilih Dokter</option>')
                  $('#doctor_id').removeAttr('disabled')
                  
                  $.each(data, function(key, doctor) {
                    $('select[name="doctor_id"]').append('<option value="'+ doctor.id +'">' + doctor.name+ '</option>')
                  })
                } else {
                  console.log('gagal');
                }
              }
            })
          }
        })
      })
    </script>
@endsection