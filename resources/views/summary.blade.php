@extends('layouts.app')

@section('title', 'Rincian')

@section('subtitle', 'Rincian')

@section('content')

@section('lists')

<h5>Nama:   {{$nalas->nama_siswa}}</h5>

<h5>Kelas:  {{$nalas->nama_kelas}}</h5> 
@foreach($grades as $key => $data)
<h5 class="text-right add"><a href="/input/{{$data->id}}">Setor 〉</a></h5>
@endforeach
    <div class="card w-auto">
    <div class="card-body">

        <h3>Kredit</h3><h5 class="text-right add"><a href="/kredit/{{$data->id}}">Input Kredit 〉</a></h5>
        <table class="table table-hover table-borderless border-bottom border-left border-right border-top">
        <thead class="thead-light border-bottom">
		    
            <tr>
            <th>SPP</th>
			<th>KI</th>
			<th>PKL</th>
            <th>SERAGAM</th>
            <th>ASURANSI</th>
            <th>PSIKOTES</th>
            <th>TOTAL</th>
            </tr>
            
        </thead>
        <tbody>
        @foreach($kredit as $key => $data)
        <tr>
            <th>{{$data->SPPK}}</th>
            <th>{{$data->KIK}}</th>
            <th>{{$data->PKLK}}</th>
            <th>{{$data->SERAGAMK}}</th>
            <th>{{$data->ASURANSIK}}</th>
            <th>{{$data->PSIKOTESTK}}</th>
            <th>{{$data->TOTALK}}</th>
		</tr>
        @endforeach
        </tbody>
        </table>

<br><br><br>

        <h3>Riwayat Setoran</h3>
        <table class="table table-hover border-right border-left">
        <thead class="thead-light">

		    <tr>
            <th>NO</th>
			<th>TANGGAL</th>
			<th>SPP</th>
			<th>KI</th>
			<th>PKL</th>
            <th>SERAGAM</th>
            <th>ASURANSI</th>
            <th>PSIKOTES</th>
            <th>TOTAL</th>
            <th>PENYETOR</th>
            <th>PENERIMA</th>
		    </tr>
        
        </thead>
        <tbody>
        
        @php
        $nomor_urut = 1;
        @endphp
        @foreach($uang as $key => $data)

        <tr>
            <th>{{$nomor_urut}}</th>
			<th>{{$data->tanggal_transaksi}}</th>
			<th>{{$data->SPP}}</th>
            <th>{{$data->KI}}</th>
            <th>{{$data->PKL}}</th>
            <th>{{$data->SERAGAM}}</th>
            <th>{{$data->ASURANSI}}</th>
            <th>{{$data->PSIKOTEST}}</th>
            <th>{{$data->TOTAL}}</th>
            <th>{{$data->penyetor}}</th>
            <th>{{$data->penerima}}</th>
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