<?php

namespace App\Http\Controllers;

use Session;
use Redirect;
use App\Http\Controllers\Controller;
use App\Models\Perencanaan;
use App\Models\UnitKerja;

class HomeController extends Controller
{
    public function index()
    {

    return view('welcome');
        // return view('pages.'.$page->template, $this->data);
    }
    public function getPerencanaan()
    {
        if (Session::has('tahun')){ 
        $tahun = session('tahun');
        }else{
        $tahun = date('Y');
        session(['tahun' => $tahun]);
        }
        $i = 0;
        $perencanaanawal = UnitKerja::join('perencanaan','perencanaan.unitkerja_id','unitkerja.unitkerja_id')->select('unitkerja.unitkerja_id','rkt_id','nama_unit','iku_id','renstra','pk','keterangan','tahun')->where('perencanaan.tahun','=',$tahun)->where('unitkerja.parent_id','=','0')->orWhereNull('perencanaan.tahun')->where('unitkerja.parent_id','=','0')->get();
        return view('hal.perencanaan')->with('tahun',$tahun)->with('perencanaan',$perencanaanawal)->with('i',$i);
    }

    public function getPerencanaanUk($unit)
    {
        if (Session::has('tahun')){ 
        $tahun = session('tahun');
        }else{
        $tahun = date('Y');
        session(['tahun' => $tahun]);
        }
        $i = 0;
        $unitkerjanya = UnitKerja::find($unit);
        $perencanaan = UnitKerja::join('perencanaan','perencanaan.unitkerja_id','unitkerja.unitkerja_id')->select('unitkerja.unitkerja_id','rkt_id','nama_unit','iku_id','renstra','pk','keterangan','tahun')->where('perencanaan.tahun','=',$tahun)->where('unitkerja.parent_id','=',$unit)->orWhereNull('perencanaan.tahun')->where('unitkerja.parent_id','=',$unit)->get();
        return view('hal.perencanaanuk')->with('tahun',$tahun)->with('perencanaan',$perencanaan)->with('unitkerjanya',$unitkerjanya)->with('i',$i);
    }
    
    public function changeTahun($tahun)
    {
        session(['tahun' => $tahun]);
        return redirect::back();
    }

    function getPengukuran($unit = null) {
        if (Session::has('tahun')){ 
            $tahun = session('tahun');
        }else{
            $tahun = date('Y');
            session(['tahun' => $tahun]);
        }

        $pengukurans     =   UnitKerja::join('pengukuran', 'pengukuran.unitkerja_id', 'unitkerja.unitkerja_id');

        if(Session::has('tahun')) {
            $pengukurans->whereYear('pengukuran.created_at', Session::get('tahun'));
        }

        if($unit != null) {
            $pengukurans->where('parent_id', $unit);
        }

        $pengukuran      =   $pengukurans->get();

        return view('hal.pengukuran', compact('tahun', 'pengukuran'));
    }
}