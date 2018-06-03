<?php

namespace App\Http\Controllers;

use Session;
use Redirect;
use Response;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Perencanaan;
use App\Models\Pengukuran;
use App\Models\UnitKerja;
use App\Models\Rkt;
use App\Models\Iku;


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
        $perencanaanawal =   UnitKerja::leftJoin('perencanaan', 'unitkerja.unitkerja_id', 'perencanaan.unitkerja_id')->select('unitkerja.unitkerja_id','rkt_id','nama_unit','iku_id','renstra','pk','keterangan','tahun', 'perancanaan_id')->where('perencanaan.tahun','=',$tahun)->where('unitkerja.parent_id','=','0')->orWhereNull('perencanaan.tahun')->where('unitkerja.parent_id','=','0')->get();

        $unit            =   UnitKerja::get();

        return view('hal.perencanaan', compact('tahun', 'i', 'unit'))->with('perencanaan',$perencanaanawal);
    }

    function editPerencanaan($id) {
      $data   =   Perencanaan::where('perancanaan_id', $id)->join('unitkerja', 'perencanaan.unitkerja_id', 'unitkerja.unitkerja_id')->first();

      return Response::json($data);
    }

    function updatePerencanaan($id, Request $request) {
      $this->validate($request, [
        'unitkerja_id'   =>  'required',
      ]);

      $perencanaan  = Perencanaan::where('perancanaan_id', $id)->first();

      $rensra   =   $request->file('rensra');
      $pk       =   $request->file('pk');

      if ($rensra != null || $rensra != '') {
        $r_name   =   str_slug($request->nama_unit) . '_rensra_.' . $rensra->getClientOriginalExtension();
        $rensra->move(public_path('/files'), $r_name);
        $request->request->add(['renstra' => $r_name]);
      }

      if ($pk != null || $pk != '') {
        $p_name   =   str_slug($request->nama_unit) . '_pk_.' . $rensra->getClientOriginalExtension();
        $pk->move(public_path('/files'), $p_name);
        $request->request->add(['pk' => $pk]);
      }

      Perencanaan::where('perancanaan_id', $id)->update($request->except(['_token']));

      return redirect()->back();
    }

    function download($files) {
      $file = './files/' . $files;
      return Response::download($file);
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
        $perencanaan = UnitKerja::leftJoin('perencanaan','perencanaan.unitkerja_id','unitkerja.unitkerja_id')->select('unitkerja.unitkerja_id','rkt_id','nama_unit','iku_id','renstra','pk','keterangan','tahun')->where('perencanaan.tahun','=',$tahun)->where('unitkerja.parent_id','=',$unit)->orWhereNull('perencanaan.tahun')->where('unitkerja.parent_id','=',$unit)->get();
        return view('hal.perencanaanuk')->with('tahun',$tahun)->with('perencanaan',$perencanaan)->with('unitkerjanya',$unitkerjanya)->with('i',$i);
    }

    function getPerencanaanTambah(Request $request){
      $this->validate($request, [
        'unitkerja_id'   =>  'required',
      ]);

      $rensra   =   $request->file('rensra');
      $pk       =   $request->file('pk');

      if ($rensra != null || $rensra != '') {
        $r_name   =   str_slug($request->nama_unit) . '_rensra_.' . $rensra->getClientOriginalExtension();
        $rensra->move(public_path('/files'), $r_name);
        $request->request->add(['renstra' => $r_name]);
      }

      if ($pk != null || $pk != '') {
        $p_name   =   str_slug($request->nama_unit) . '_pk_.' . $rensra->getClientOriginalExtension();
        $pk->move(public_path('/files'), $p_name);
        $request->request->add(['pk' => $pk]);
      }

      Perencanaan::create($request->except(['_token']));

      return redirect()->back();
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


       // if(Session::has('tahun')) {
         //   $pengukurans->whereYear('pengukuran.created_at', Session::get('tahun'));
       // }

        if($unit != null) {
        $pengukurans     =   UnitKerja::leftJoin('pengukuran', 'pengukuran.unitkerja_id', 'unitkerja.unitkerja_id')->where('pengukuran.tahun','=',$tahun)->where('unitkerja.parent_id','=',$unit)->orWhereNull('pengukuran.tahun')->where('unitkerja.parent_id','=',$unit);
        }else{

        $pengukurans     =   UnitKerja::leftJoin('pengukuran', 'pengukuran.unitkerja_id', 'unitkerja.unitkerja_id')->where('pengukuran.tahun','=',$tahun)->where('unitkerja.parent_id','=','0')->orWhereNull('pengukuran.tahun')->where('unitkerja.parent_id','=','0');
        }

        $pengukuran      =   $pengukurans->get();

        $unit            =   UnitKerja::get();

        return view('hal.pengukuran', compact('tahun', 'pengukuran', 'unit'));
    }

    function getPengukuranTambah(Request $request) {
        $u  =   UnitKerja::where('nama_unit', $request->unit)->first();

        $request->request->add(['unitkerja_id' => $u->unitkerja_id]);

        Pengukuran::create($request->except(['unit']));

        return Response::json('true');
    }

    function getRkt($unit) {
        $rkt    =   Rkt::where('parent_rkt', 0)
                    ->where('unitkerja_id', $unit)->get();

        $unit   =   UnitKerja::where('unitkerja_id', $unit)->first();

        $i      =   0;

        return view('hal.rkt', compact('rkt', 'unit', 'i'));
    }

    function postRkt($unit, Request $request) {
      $request->request->add(['unitkerja_id' => $unit]);

      Rkt::create($request->except(['_token']));

      return redirect()->back();
    }

    function editRkt($id) {
      $data   =   Rkt::where('rkt_id', $id)
                  ->select('rkt.*', 'rkt.2017 as satu', 'rkt.2018 as dua', 'rkt.2019 as tiga', 'rkt.2020 as empat')->first();

      return Response::json($data);
    }

    function updateRkt($id, Request $request) {
      $r = Rkt::where('rkt_id', $id)->update($request->except(['_token']));

      return redirect()->back();
    }

    function getIku($unit) {
        $iku    =   Iku::where('unitkerja_id', $unit)->get();

        $unit   =   UnitKerja::where('unitkerja_id', $unit)->first();

        $i      =   0;

        return view('hal.iku', compact('iku', 'unit', 'i'));
    }
}
