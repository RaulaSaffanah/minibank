<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transactions;
use App\Students;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $debit = DB::table('transactions')->sum('debit');
        $kredit = DB::table('transactions')->sum('kredit');
        return view('welcome', ['debit' => $debit, 'kredit' => $kredit]);
    }

    function pemb(){

        $id = request('id');

        $daftarkelas = DB::table('grades')->get();

        if($id > 0){
            $grades = DB::table('grades')
            ->join('students', 'grades.id', '=', 'students.grade_id')
            ->select('students.*', 'grades.nama_kelas')
            ->where('grades.id', $id)
            ->get();
        }
        else{
            $grades = DB::table('grades')
            ->join('students', 'grades.id', '=', 'students.grade_id')
            ->select('students.*', 'grades.nama_kelas')
            ->get();
        }

        //  dd($daftarkelas);

        return view('pembayaran', ['grades' => $grades, 'daftarkelas' => $daftarkelas]);
    }

    public function in(){

        $id = request('id');
        
        $jenis = DB::table('types')->get();

        $user = DB::table('users')->get();

        $indat = DB::table('students')
        ->join('grades', 'grades.id', '=', 'students.grade_id')
        ->select('grades.nama_kelas', 'students.grade_id as kelas', 'students.id as student_id', 'students.nama_siswa as nama')
        ->where('students.id', $id)
        ->first();

        // dd($indat);

        return view('input', ['jenis' => $jenis, 'indat' => $indat, 'user' => $user]);
    }

    public function inprocess(){

        $id = request('id');
        
        $debit = new transactions();
 
        $debit->debit = request('debit');
        $debit->kredit = request('kredit');
        $debit->terbilang = request('terbilang');
        $debit->student_id = request('student_id');
        $debit->type_id = request('type_id');
        $debit->penerima = request('penerima');
        $debit->penyetor = request('penyetor');

        $debit->save();
        
        // dd($debit);

        return redirect('/sum/' . $debit->student_id);
    }

    public function add()
    {
        $anak = DB::table('students')->get(); 
        $daftarkelas = DB::table('grades')->get();
        // dd($anak);
       

        return view('test', ['anak' => $anak, 'daftarkelas' => $daftarkelas]);
    }


    public function addprocess(){

        $anak = new students();
 
        $anak->nama_siswa = request('nama_siswa');
        $anak->grade_id = request('grade_id');
        $anak->nis = request('nis');
        $anak->nisn = request('nisn');

        $anak->save();
        // dd($anak);
        return redirect('/bayar');
    }

    public function log(){
        return view('login');
    }
    public function regis(){
        return view('register');
    }
    public function sum(){
        
        $id = request('id');

        $uang = DB::select( DB::raw("SELECT *, transactions.created_at as tanggal_transaksi, transactions.penerima, transactions.penyetor, MAX(case WHEN type_id = 1 THEN debit END ) AS SPP, MAX(case WHEN type_id = 2 THEN debit END ) AS KI, MAX(case WHEN type_id = 3 THEN debit END ) AS PKL, MAX(case WHEN type_id = 4 THEN debit END ) AS SERAGAM, MAX(case WHEN type_id = 5 THEN debit END ) AS ASURANSI, MAX(case WHEN type_id = 6 THEN debit END ) AS PSIKOTEST, SUM(case type_id WHEN 1 THEN debit WHEN 2 THEN debit WHEN 3 THEN debit WHEN 4 THEN debit WHEN 5 THEN debit  WHEN 6 THEN debit ELSE 0 END) AS TOTAL FROM `transactions` JOIN types ON types.id = transactions.type_id WHERE student_id = $id and transactions.debit is not null  GROUP BY DATE_FORMAT(transactions.created_at, '%DD-%MM-%YYYY') ORDER BY STR_TO_DATE(transactions.created_at, '%YYYY-%MM-%DD') DESC") );

        $kredit = DB::select( DB::raw("SELECT *, MAX(case WHEN type_id = 1 THEN kredit END ) AS SPPK, MAX(case WHEN type_id = 2 THEN kredit END ) AS KIK, MAX(case WHEN type_id = 3 THEN kredit END ) AS PKLK, MAX(case WHEN type_id = 4 THEN kredit END ) AS SERAGAMK, MAX(case WHEN type_id = 5 THEN kredit END ) AS ASURANSIK, MAX(case WHEN type_id = 6 THEN kredit END ) AS PSIKOTESTK, SUM(case type_id WHEN 1 THEN kredit WHEN 2 THEN kredit WHEN 3 THEN kredit WHEN 4 THEN kredit WHEN 5 THEN kredit  WHEN 6 THEN kredit ELSE 0 END) AS TOTALK FROM `transactions` JOIN types ON types.id = transactions.type_id WHERE student_id = $id and transactions.kredit is not null  GROUP BY DATE_FORMAT(transactions.created_at, '%YYYY-%MM')") );

        $nalas = DB::table('transactions')
        ->join('students', 'transactions.student_id', '=', 'students.id')
        ->join('grades', 'students.grade_id', '=', 'grades.id')
        ->select('transactions.*', 'grades.nama_kelas', 'students.nama_siswa', 'students.nis')
        ->where('students.id', $id)
        ->first();

        $grades = DB::table('grades')
        ->join('students', 'grades.id', '=', 'students.grade_id')
        ->select('students.*', 'grades.nama_kelas')
        ->where('students.id', $id)
        ->get();

        // dd($uang);

        return view('summary', ['nalas' => $nalas, 'uang' => $uang, 'grades' => $grades, 'kredit' => $kredit]);
    }
    public function daftar(){

        $id = request('id');


        $grades = DB::table('grades')
        ->join('students', 'grades.id', '=', 'students.grade_id')
        ->select('students.*', 'grades.nama_kelas')
        ->where('students.id', $id)
        ->get();

    //    dd($grades);   

        return view('daftarsiswa', ['grades' => $grades]);
    }

    
    public function indebt(){

      
        $id = request('id');
        
        $jenis = DB::table('types')->get();

        $user = DB::table('users')->get();

        $indat = DB::table('students')
        ->join('grades', 'grades.id', '=', 'students.grade_id')
        ->select('grades.nama_kelas', 'students.grade_id as kelas', 'students.id as student_id', 'students.nama_siswa as nama')
        ->where('students.id', $id)
        ->first();

        // dd($indat);

        return view('indebt', ['jenis' => $jenis, 'indat' => $indat, 'user' => $user]);

    }

    // public function indebtpro(){

    //     $id = request('id');
        
    //     $credit = new transactions();
 
    //     $credit->credit = request('kredit');
    //     $credit->student_id = request('student_id');
    //     $credit->type_id = request('type_id');

    //     $credit->save();
        
    //     // dd($debit);

    //     return redirect('/bayar');
    // }


}
