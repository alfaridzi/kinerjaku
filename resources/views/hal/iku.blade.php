@extends('include.master')
@section('title') Perencanaan Kinerja Kementerian Koordinasi Keuangan
@endsection

@section('css')
@endsection
@section('js')
<script src="/js/iku.js"></script>
<script src="/js/jquery-3.3.1.min.js"></script>
@endsection
@section('content')
<header class="main-header">
    <div class="container">
        <h1 class="page-title">Indikator Kerja Utama</h1>

        <ol class="breadcrumb pull-right">
            <li><a href="#">Indikator Kerja Utama</a></li>
            <li class="active">Unit Kerja</li>
        </ol>
    </div>
</header>
<div class="container">
  @if(Auth::user() && \Session::has('role'))
    <br><button type="button" class="btn btn-info btn-md created" data-toggle="modal" data-target="#myModal">Tambah IKU</button><br><br>

    <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah IKU</h4>
      </div>
      <form action="/perencanaan/iku/tambah/{{ $unit->unitkerja_id }}" method="post">
        {{ csrf_field() }}
      <div class="modal-body">
          <div>
              <span>Nomer Sasaran</span>
              <input type="text" name="no" id="no" class="form-control" placeholder="Nomer Sasaran">
          </div><br>
          <div>
              <span>Sasaran</span>
              <input type="text" name="sasaran" id="sasaran" class="form-control" placeholder="Sasaran">
          </div><br>
          <div>
              <span>Nomer Indikator</span>
              <input type="text" name="no_indikator" id="no_indikator" class="form-control" placeholder="Nomer Indikator">
          </div><br>
          <div>
              <span>Indikator</span>
              <input type="text" name="indikator" id="indikator" class="form-control" placeholder="Indikator">
          </div><br>
          <div>
              <span>Satuan</span>
              <input type="text" name="satuan" id="satuan" class="form-control" placeholder="Satuan">
          </div><br>
          <div>
              <span>Target Tahunan</span>
              <input type="text" name="target_tahunan" id="target_tahunan" class="form-control" placeholder="Target Tahunan">
          </div><br>
          <div>
              <span>Tahun</span>
              <input type="text" name="tahun" id="tahun" class="form-control" placeholder="Tahun">
          </div><br>
          <div>
              <span>Periode</span>
              <input type="text" name="periode" id="periode" class="form-control" placeholder="Periode">
          </div><br>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="submit_data">Tambah Data</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </div>
      </form>

  </div>
  </div>
  @endif

<section class="margin-bottom">
    <div class="panel panel-primary-dark">
		<div class="panel-heading">Indikator Kerja Utama {{ $unit->nama_unit }}</div>
		<div class="panel-body">
        <table class="table table-hover table-striped table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th width="20px">NO</th>
                    <th>SASARAN STRATEGIS</th>
                    <th style="text-align: center; ">NO</th>
                    <th style="text-align: left; ">INDIKATOR KINERJA</th>
                    <th style="text-align: center; ">SATUAN</th>
                    <th style="text-align: center; ">TARGET TAHUNAN</th>
                    <th style="text-align: center; ">PERIODE PENGUKURAN</th>
                </tr>
            </thead>
            <tbody id="content">
                @foreach($iku as $i)
                    <tr>
                        <td> @if($i->no) {{ $i->no }} @endif </td>
                        <td style="text-align:left">{{ $i->sasaran }} @if(Auth::user() && \Session::has('role') && in_array("1", \Session::get('role')) ) <button type="button" class="btn btn-info btn-sm update" data-id="{{ $i->iku_id }}" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i> Update</button>@endif</td>
                        <td style="text-align:left">{{ $i->no_indikator }}</td>
                        <td style="text-align:left">{{ $i->indikator }}</td>
                        <td style="text-align:left">{{ $i->satuan }}</td>
                        <td style="text-align:left">{{ $i->target_tahunan }}</td>
                        <td style="text-align:left">{{ $i->periode }}</td>
                    </tr>

                @endforeach
            </tbody>
        </table>
	</div>
	</div>
</section>
</div>
@endsection
