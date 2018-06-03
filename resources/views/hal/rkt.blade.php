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
        <h1 class="page-title">RKT PROGRAM</h1>

        <ol class="breadcrumb pull-right">
            <li><a href="#">RKT PROGRAM</a></li>
            <li class="active">Unit Kerja</li>
        </ol>
    </div>
</header>
<div class="container">
<section class="margin-bottom">
    <div class="panel panel-primary-dark">
		<div class="panel-heading">RKT PROGRAM {{ $unit->nama_unit }}</div>
		<div class="panel-body">
        <table class="table table-hover table-striped table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th width="20px">Kode</th>
                    <th>Sasaran / Indikator Kerja</th>
                    <th width="7%" style="text-align: center; ">2017</th>
                    <th width="7%" style="text-align: center; ">2018</th>
                    <th width="7%" style="text-align: center; ">2019</th>
                    <th width="7%" style="text-align: center; ">2020</th>
                </tr>
            </thead>
            <tbody id="content">
                @foreach($rkt as $no => $r)
                    <tr>
                        <td>{{ sprintf('%02s', $no += 1) }}</td>
                        <td style="text-align:left" colspan="5">{{ $r->sasaran }}</td>
                    </tr>
                    @foreach(\App\Http\Controllers\StatikController::rkt($r->rkt_id) as $i => $child)
                    <tr>
                        <td></td>
                        <td style="text-align:left">{{ sprintf('%02s', $i += 1) }} - {{ $child->sasaran }}</td>
                        <td>{{ $child['2017'] }}</td>
                        <td>{{ $child['2018'] }}</td>
                        <td>{{ $child['2019'] }}</td>
                        <td>{{ $child['2020'] }}</td>
                    </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
	</div>
	</div>
</section> 
</div>
@endsection