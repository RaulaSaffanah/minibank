@extends('layouts.app')

@section('title', 'Print')

@section('subtitle', 'Mini bank')

@section('content')

@section('form')

<div class="row">
<div class="col">
<button type="button" class="btn btn-sm btn-outline-secondary mt-2 ml-3" id="tombol">Print</button>
</div>
<div class="col">
@foreach($grades as $key => $data)
<h5 class="text-right add"><a href="/input/{{$data->id}}">Setor 〉</a></h5>
@endforeach
</div>
</div>

    <div class="card mb-2 prt" id="print">
    <div class="card-body">
        <H5 class="text-center">SLIP SETORAN TUNAI</H5>
        <H4 class="text-center">MS BANK</H4>
        <H5 class="text-center">SMK NEGERI 1 DEPOK</H5>
        <P>NO:</P>
        <P>NAMA:</P>
        <P>KELAS:</P>
        <P class="text-right">TANGGAL:</P>

        <table class="table table-borderless border-bottom border-left border-right border-top">
        <thead class="border-bottom">
		    
            <tr>
            <th>NO</th>
			<th>JENIS SETORAN</th>
			<th>KET</th>
            <th>JUMLAH</th>
            </tr>
            
        </thead>
        <tbody>
        <tr>
            <th>1</th>
			<th>SPP</th>
			<th></th>
            <th>Rp</th>
            </tr>
            <tr>
            <th>2</th>
			<th>KI</th>
			<th></th>
            <th>Rp</th>
            </tr>
            <tr>
            <th>3</th>
			<th>PKL</th>
			<th></th>
            <th>Rp</th>
            </tr>
            <tr>
            <th>4</th>
			<th>SERAGAM</th>
			<th></th>
            <th>Rp</th>
            </tr>
        </tbody>
        </table>
<br>
            <p class="font-italic">TERBILANG...</p>
<br>
    <div class="row">
    <div class="col-6 text-center">
    <p>PENYETOR</p>
    </div>
    <div class="col-6 text-center">
    <p>PENERIMA</p>
    </div>
    </div>
    <br><br><br><br><br>
    <p>*)SAH JIKA ADA TANDATANGAN YANG BERWENANG DAN STEMPEL MS.BANG</p>
    <p>*)BUKTIS SETORAN WAJIB DI SIMPAN</p>
    </div>
    </div>
    </div>
    </div>
<br><br><br>
        @endsection

        <script src="/js/jquery-3.4.1.min.js"></script>

        <script src="/js/jspdf.min.js"></script>

<script>
    $(function(){
        function printPDF() {
            var printDoc = new jsPDF();
            printDoc.fromHTML($('#print').get(0), 10, 10, {'height': 50});
            printDoc.autoPrint();
            printDoc.output("dataurlnewwindow"); // this opens a new popup,  after this the PDF opens the print window view but there are browser inconsistencies with how this is handled
        }
        $('#tombol').on('click', function(){
            printPDF();
        })
    });
</script>