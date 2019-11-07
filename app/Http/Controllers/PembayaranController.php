<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tbl_transaksi;

class PembayaranController extends Controller
{

    public function lob(){
        return view('lobby');
    }
 
}