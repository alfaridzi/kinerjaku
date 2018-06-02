@extends('include.master')
@section('title') Perencanaan Kinerja Kementerian Koordinasi Keuangan
@endsection

@section('css')
@endsection
@section('js')
@endsection
@section('content')
<header class="main-header">
    <div class="container">
        <h1 class="page-title">PERENCANAAN KINERJA {!!$unitkerjanya->nama_unit!!}</h1>

        <ol class="breadcrumb pull-right">
            <li><a href="{!! URL::to('perencanaan') !!}">Perencanaan Kinerja</a></li>
            <li class="#">Unit Kerja</li>
            <li class="active">{!!$unitkerjanya->nama_unit!!}</li>
        </ol>
    </div>
</header>
<div class="container">
<section class="margin-bottom">
    <div class="panel panel-primary-dark">
		<div class="panel-heading">PERENCANAAN KINERJA PADA TAHUN {{$tahun}} <select  onChange="window.document.location.href=this.options[this.selectedIndex].value;" style="color:black"class="pull-right">
        <option value="thn/2020"@if($tahun == '2020') selected @endif>2020</option>
		<option value="thn/2019"@if($tahun == '2019') selected @endif>2019</option>
		<option value="thn/2018"@if($tahun == '2018') selected @endif>2018</option>
		<option value="thn/2017"@if($tahun == '2017') selected @endif>2017</option>
		<option value="thn/2016"@if($tahun == '2016') selected @endif>2016</option>
		</select></div>
		<div class="panel-body">
	<table class="table table-hover table-striped table-bordered table-hover text-center">
								<thead>
									<tr>
										<th width="20px">NO</th>
                                        <th>NAMA UNIT KERJA</th>
                                        <th width="5%" style="text-align: center; ">RENSTRA</th>
                                        <th width="7%" style="text-align: center; ">RKT</th>
                                        <th width="7%" style="text-align: center; ">PK</th>
                                        <th width="7%" style="text-align: center; ">IKU</th>
                                        <th width="10%" style="text-align: center; ">CASCADING</th>
									</tr>
								</thead>
								<tbody>
                                    @forelse($perencanaan as $unitkerja)
    						    <tr>
								    <td><?php $i++;echo $i;?></td>
								    <td style="text-align: left">{!! $unitkerja->nama_unit !!}</td>
                                    <td>
                                        @if($unitkerja->renstra)
                                        <a href="{!! $unitkerja->renstra !!}" target="_blank" class="glyphicon glyphicon-search"title="Renstra {!! $unitkerja->nama_unit !!}"></a>
                                        @endif </td>
                                    <td>
                                        @if($unitkerja->rkt_id)
                                        <a href="{!! URL::to('rkt/'.$unitkerja->unitkerja_id.'/'.$unitkerja->rkt_id) !!}" title="RKT {!! $unitkerja->nama_unit !!}"><i class="glyphicon glyphicon-search"></i></a>
                                        @endif </td>
                                    <td>
                                        @if($unitkerja->pk)
                                        <a href="{!! $unitkerja->pk !!}" target="_blank"title="PK {!! $unitkerja->nama_unit !!}" class="glyphicon glyphicon-search"></a>
                                        @endif </td>
                                     <td>
                                        @if($unitkerja->iku)
                                        <a href="{!! URL::to('iku/'.$unitkerja->unitkerja_id.'/'.$unitkerja->iku_id) !!}" title="IKU {!! $unitkerja->nama_unit !!}"><i class="glyphicon glyphicon-search"></i></a>
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