@extends('include.master')
@section('title') Perencanaan Kinerja Kementerian Koordinasi Keuangan
@endsection

@section('css')
@endsection
@section('js')
<script src="/js/app.js"></script>
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
                        <td style="text-align:left">{{ $i->sasaran }}</td>
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
