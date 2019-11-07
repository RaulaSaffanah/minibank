@extends('layouts.app')

@section('title', 'Setor')

@section('subtitle', 'Setor')

@section('content')

@section('form')

<div class="card mb-3">
  <div class="card-body">
      <form method="post" action="/inprocess">
      {{ csrf_field() }}
  
    
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Name     :</label>
    <div class="col-sm-10">
      <input type="text" name="nama_siswa" readonly class="form-control-plaintext" id="staticEmail" value="{{$indat->nama}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Kelas     :</label>
    <div class="col-sm-10">
      <input type="text" name="nama_kelas" readonly class="form-control-plaintext" id="staticEmail" value="{{$indat->nama_kelas}}">
    </div>
  </div>
      
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">ID Siswa     :</label>
    <div class="col-sm-10">
      <input type="text" name="student_id" readonly class="form-control-plaintext" id="inputAddress" placeholder="ID Siswa" value="{{$indat->student_id}}">
    </div>
  </div>

  <div class="form-group mt-2">
      <label for="inputState">Jenis</label>
      <select id="inputState" name="type_id" class="form-control">
        <option selected>Choose...</option>

        @foreach($jenis as $key => $data)

        <option value="{{$data->id}}">{{$data->nama_tipe}}</option>

        @endforeach
        
      </select>
    </div>

  <div class="form-group mb-2">
    <label for="inputAddress">Jumlah</label>
        <div class="input-group-prepend">
          <div class="input-group-text">Rp.</div>
    <input type="text" name="kredit" class="form-control" id="inputAddress" placeholder="Jumlah">
  </div>

  <br>

  <button type="submit" class="btn btn-secondary add2">OK</button>
</form>
</div>
</div>
        @endsection
