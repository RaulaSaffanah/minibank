@extends('layouts.app')

@section('title')

@section('subtitle', 'Mini Bank')

@section('content')

<br><br><br><br><br>
<div class="content">
     <div class="title m-b-md">
        Mini Bank
     </div>

     <div class="container mt-5">
  <div class="row align-items-center justify-content-center">

    <div class="col-3" name="debit">
    <div class="card" style="height=50rem;">
    <div class="card-body">

    <h3>Debit</h3>
    Rp.{{number_format($debit,0,",",".") }}
    </div>
    </div>
    </div>

    <div class="col-3">
    <div class="card">
    <div class="card-body">

    <h3>Kredit</h3>
    Rp.{{number_format($kredit,0,",",".")}}
    </div>
    </div>
    </div>
  </div>
</div>
@endsection