@extends('include.master')
@section('title') Perencanaan Kinerja Kementerian Koordinasi Keuangan
@endsection

@section('css')
@endsection
@section('js')
<script src="/js/perencanaan.js"></script>
<script src="/js/jquery-3.3.1.min.js"></script>
@endsection
@section('content')
<header class="main-header">
    <div class="container">
        <h1 class="page-title">PERENCANAAN KINERJA {{$tahun}} </h1>

        <ol class="breadcrumb pull-right">
            <li><a href="#">Perencanaan Kinerja</a></li>
            <li class="active">Unit Kerja</li>
        </ol>
    </div>
</header>
<div class="container">
<section class="margin-bottom">
    <div class="panel panel-primary-dark">
		<div class="panel-heading">PERENCANAAN KINERJA PADA TAHUN  {{$tahun}} <select  onChange="window.document.location.href=this.options[this.selectedIndex].value;" style="color:black"class="pull-right">
    <option value="thn/2020"@if($tahun == '2020') selected @endif>2020</option>
		<option value="thn/2019"@if($tahun == '2019') selected @endif>2019</option>
		<option value="thn/2018"@if($tahun == '2018') selected @endif>2018</option>
		<option value="thn/2017"@if($tahun == '2017') selected @endif>2017</option>
		<option value="thn/2016"@if($tahun == '2016') selected @endif>2016</option>
		</select></div>

    @if(Auth::user() && \Session::has('role'))
    <br><button type="button" class="btn btn-info btn-md created" data-toggle="modal" data-target="#myModal">Tambah Perencanaan Kinerja</button><br><br>

    <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Tambah Pengukuran Kinerja</h4>
        </div>
        <form action="/perencanaan/tambah" method="post">
          {{ csrf_field() }}
        <div class="modal-body">
            <div>
              <span>Nama Unit</span>
                <select id="unitkerja_id" name="unitkerja_id" class="form-control">
                    @foreach($unit as $u)
                        <option value="{{ $u->unitkerja_id }}" data-id="{{ $u->nama_unit }}">{{ $u->nama_unit }}</option>
                    @endforeach
                </select>
            </div><br>
            <div>
                <span>RENSRA</span>
                <input type="file" name="renstra" id="renstra" class="form-control" placeholder="RENSRA">
            </div><br>
            <div>
                <span>PK</span>
                <input type="file" name="pk" id="pk" class="form-control" placeholder="PK">
            </div><br>
            <div>
                <span>Tahun</span>
                <input type="number" name="tahun" id="tahun" class="form-control" placeholder="Tahun">
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

		<div class="panel-body">
	<table class="table table-hover table-striped table-bordered table-hover text-center">
								<thead>
									<tr>
										<th width="20px">NO</th>
                                        <th>NAMA UNIT KERJA</th>
                                        <th width="7%" style="text-align: center; ">TUSI</th>
                                        <th width="7%" style="text-align: center; ">RENSTRA</th>
                                        <th width="7%" style="text-align: center; ">RKT</th>
                                        <th width="7%" style="text-align: center; ">RENJA</th>
                                        <th width="7%" style="text-align: center; ">PK</th>
                                        <th width="7%" style="text-align: center; ">IKU</th>
                                        <th width="10%" style="text-align: center; ">CASCADING</th>
									</tr>
								</thead>
								<tbody>
                                    @forelse($perencanaan as $unitkerja)
    						    <tr>
								    <td><?php $i++;echo $i;?></td>
								    <td style="text-align: left">{!! $unitkerja->nama_unit !!} @if(Auth::user() && $unitkerja->perancanaan_id && \Session::has('role') && in_array("1", \Session::get('role')) ) <button type="button" class="btn btn-info btn-sm update" data-id="{{ $unitkerja->perancanaan_id }}" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i> Update</button>@endif</td>
                                    <td>
                                        @if($unitkerja->tusi)
                                        <a href="{!! $unitkerja->tusi !!}" target="_blank"title="TUSI {!! $unitkerja->nama_unit !!}" class="glyphicon glyphicon-search"></a>
                                        @endif </td>
                                    <td>
                                        @if($unitkerja->renstra)
                                        <a href="/perencanaan/download/{!! $unitkerja->renstra !!}" target="_blank" class="glyphicon glyphicon-search"title="Renstra {!! $unitkerja->nama_unit !!}"></a>
                                        @endif </td>
                                    <td>
                                        @if($unitkerja->rkt_id)
                                        <a href="{!! URL::to('rkt/'.$unitkerja->unitkerja_id.'/'.$unitkerja->rkt_id) !!}" title="RKT {!! $unitkerja->nama_unit !!}"><i class="glyphicon glyphicon-search"></i></a>
                                        @endif </td>
                                    <td>
                                        @if($unitkerja->renja)
                                        <a href="{!! $unitkerja->renja !!}" target="_blank"title="RENJA {!! $unitkerja->nama_unit !!}" class="glyphicon glyphicon-search"></a>
                                        @endif </td>
                                    <td>
                                        @if($unitkerja->pk)
                                        <a href="/perencanaan/download/{!! $unitkerja->pk !!}" target="_blank"title="PK {!! $unitkerja->nama_unit !!}" class="glyphicon glyphicon-search"></a>
                                        @endif </td>
                                     <td>
                                        @if($unitkerja->iku_id)
                                        <a href="{!! URL::to('perencanaan/iku/'.$unitkerja->unitkerja_id) !!}" title="IKU {!! $unitkerja->nama_unit !!}"><i class="glyphicon glyphicon-search"></i></a>
                                        @endif </td>
                                    <td>
                                        <a href="{!! URL::to('perencanaan/uk/'.$unitkerja->unitkerja_id) !!}" title="Tingkat Selanjutnya {!! $unitkerja->nama_unit !!}"><i class="glyphicon glyphicon-search"></i></a></td>
								    </tr>
                                    @empty
                                    <tr><td colspan="7" align="center">Tidak ada Unit Kerja</td></tr>
                                    @endforelse
    							</tbody>
							</table>
			</div>
	</div>
</section>
</div>
@endsection
