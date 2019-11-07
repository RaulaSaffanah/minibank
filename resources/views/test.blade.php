@extends('layouts.app')

@section('title', 'add')

@section('subtitle', 'Mini Bank')

@section('content')

@section('form')

<br><br>

<div class="card mb-3">
  <div class="card-body">
      <form method="post" action="/addprocess">
      {{ csrf_field() }}
  

  <div class="form-group mb-2 mt-2">
    <label for="inputAddress">Nama</label>
    <input type="text" name="nama_siswa" class="form-control" id="inputAddress" placeholder="Nama">
  </div>

  <div class="form-group mt-2">
      <label for="inputState">Kelas</label>
      <select id="inputState" name="grade_id" class="form-control">
        <option selected>Choose...</option>

        @foreach($daftarkelas as $key => $data)

        <option value="{{$data->id}}">{{$data->nama_kelas}}</option>

        @endforeach
        
      </select>
    </div>


  <div class="form-group mb-2 mt-2">
    <label for="inputAddress">NIS</label>
    <input type="text" name="nis" class="form-control" id="inputAddress" placeholder="NIS">
  </div>

  <div class="form-group mb-2 mt-2">
    <label for="inputAddress">NISN</label>
    <input type="text" name="nisn" class="form-control" id="inputAddress" placeholder="NISN">
  </div>

  <br>

  <button type="submit" class="btn btn-secondary add2">OK</button>
</form>


        @endsection