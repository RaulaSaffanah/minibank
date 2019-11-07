@extends('layouts.app')

@section('title', 'Pembayaran')

@section('subtitle', 'Daftar Siswa')

@section('content')

@section('lists')

<div class="card">
    <div class="card-body">

<div class="form-group">
<div class="container">
<div class="row">
    
<div class="col">
<label for="inputState">Kelas</label>
      <select id="inputState" class="form-control" style="width:auto;">
        <option selected>Choose...</option>
        @foreach($daftarkelas as $key => $data)

        <option value="{{$data->id}}">{{$data->nama_kelas}}</option>

        @endforeach
      </select>

      <h5 class="mt-2 ml-1 add"><a href="/bayar">Reset ⟲</a></h5>
</div>

<div class="col text-right">
<br>
<h4 class="text-right mt-3 mr-3 add"><a href="/add">Input Siswa 〉</a></h4>
</div>

</div>
</div>

<br>

        <table class="table table-hover">
        <thead class="thead-light border-left border-right">
		<tr>
            <th>No</th>
			<th>Nama</th>
			<th>Kelas</th>
			<th>NIS</th>
			<th>NISN</th>
			<th>Action</th>
		</tr>
        </thead>
        <tbody>
        @php
        $nomor_urut = 1;
        @endphp
        @foreach($grades as $key => $data)
            <tr>    
            <td>{{$nomor_urut}}</td>
            <td>{{$data->nama_siswa}}</td>
            <td>{{$data->nama_kelas}}</td>
            <td>{{$data->nis}}</td>
            <td>{{$data->nisn}}</td>                 
            <td>
                <a href="/input/{{$data->id}}">Setor</a>
            <br>
                <a href="/sum/{{$data->id}}">Rincian</a>
            </td>
            </tr>
            @php
        $nomor_urut++;
        @endphp
            @endforeach
        </tbody>
        </table>

</div>
</div>
        @endsection

        <script src="/js/jquery-3.4.1.min.js"></script>

<script>
    $(function(){
      // bind change event to select
      $('#inputState').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = "/bayar/"+url; // redirect
          }
          return false;
      });
    });
</script>