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
        <h1 class="page-title">PENGUKURAN KINERJA</h1>

        <ol class="breadcrumb pull-right">
            <li><a href="#">Pengukuran Kinerja</a></li>
            <li class="active">Unit Kerja</li>
        </ol>
    </div>
</header>
<div class="container">
<section class="margin-bottom">
    <div class="panel panel-primary-dark">
		<div class="panel-heading">PENGUKURAN KINERJA PADA TAHUN  {{$tahun}} <select  onChange="window.document.location.href=this.options[this.selectedIndex].value;" style="color:black"class="pull-right">
        <option value="thn/2020"@if($tahun == '2020') selected @endif>2020</option>
		<option value="thn/2019"@if($tahun == '2019') selected @endif>2019</option>
		<option value="thn/2018"@if($tahun == '2018') selected @endif>2018</option>
		<option value="thn/2017"@if($tahun == '2017') selected @endif>2017</option>
		<option value="thn/2016"@if($tahun == '2016') selected @endif>2016</option>
		</select></div>
		<div class="panel-body">

        @if(Auth::user() && in_array("2", \Session::get('role')))
        <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Tambah Pengukuran Kerja</button><br><br>

        <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Pengukuran Kinerja</h4>
            </div>
            <div class="modal-body">
                <div>
                  <span>Nama Unit</span>
                    <select id="id_unit" class="form-control">
                        @foreach($unit as $u)
                            <option value="{{ $u->nama_unit }}" data-id="{{ $u->nama_unit }}">{{ $u->nama_unit }}</option>
                        @endforeach
                    </select>
                </div><br>
                <div>
                    <span>Triwulan 1</span>
                    <input type="number" id="tw1" class="form-control" placeholder="Triwulan 1">
                </div><br>
                <div>
                    <span>Triwulan 2</span>
                    <input type="number" id="tw2" class="form-control" placeholder="Triwulan 2">
                </div><br>
                <div>
                    <span>Triwulan 3</span>
                    <input type="number" id="tw3" class="form-control" placeholder="Triwulan 3">
                </div><br>
                <div>
                    <span>Triwulan 4</span>
                    <input type="number" id="tw4" class="form-control" placeholder="Triwulan 4">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="submit_data" data-dismiss="modal">Tambah Data</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>

        </div>
        </div>
        @endif

        <table class="table table-hover table-striped table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th width="20px">NO</th>
                    <th style="text-align: center; ">NAMA UNIT KERJA</th>
                    <th width="7%" style="text-align: center; ">TW1</th>
                    <th width="7%" style="text-align: center; ">TW2</th>
                    <th width="7%" style="text-align: center; ">TW3</th>
                    <th width="7%" style="text-align: center; ">TW4</th>
                    <th width="10%" style="text-align: center; ">CASCADING</th>
                </tr>
            </thead>
            <tbody id="content">
                @forelse($pengukuran as $no => $p)
                <tr>
                    <td>{{ $no += 1 }}</td>
                    <td align="left">{{ $p->nama_unit }}</td>
                    <td
                        style="color: white; background:
                        @if($p->tw1 >= 100)
                        #007f02
                        @elseif($p->tw1 >= 80 && $p->tw1 < 100)
                        #fdd700
                        @elseif($p->tw1 == 0)
                        none
                        @else
                        #fe0000
                        @endif
                        "
                    >{{ $p->tw1 }}</td>
                    <td
                        style="color: white; background:
                        @if($p->tw2 >= 100)
                        #007f02
                        @elseif($p->tw2 >= 80 && $p->tw2 < 100)
                        #fdd700
                        @elseif($p->tw2 == 0)
                        none
                        @else
                        #fe0000
                        @endif
                        "
                    >{{ $p->tw2 }}</td>
                    <td
                        style="color: white; background:
                        @if($p->tw3 >= 100)
                        #007f02
                        @elseif($p->tw3 >= 80 && $p->tw3 < 100)
                        #fdd700
                        @elseif($p->tw3 == 0)
                        none
                        @else
                        #fe0000
                        @endif
                        "
                    >{{ $p->tw3 }}</td>
                    <td
                        style="color: white; background:
                        @if($p->tw4 >= 100)
                        #007f02
                        @elseif($p->tw4 >= 80 && $p->tw4 < 100)
                        #fdd700
                        @elseif($p->tw4 == 0)
                        none
                        @else
                        #fe0000
                        @endif
                        "
                    >{{ $p->tw4 }}</td>
                    <td><a href="/pengukuran/uk/{{ $p->unitkerja_id }}"><i class="glyphicon glyphicon-search"></i></a></td>
                </tr>
                @empty
                <tr><td colspan="7" align="center">Tidak ada Unit Kerja</td></tr>
                @endforelse
            </tbody>
        </table>

        <h3>Penjelasan warna</h3>

        <table>
            <tr>
                <th>No</th>
                <th>Warna</th>
                <th>Keterangan</th>
            </tr>
            <tr>
                <td>1</td>
                <td><div style="background: #007f02; width:20px; height: 10px"></div></td>
                <td>Baik (Skor >= 100)</td>
            </tr>
            <tr>
                <td>2</td>
                <td><div style="background: #fdd700; width:20px; height: 10px"></div></td>
                <td>Hati hati (80 <= Skor < 100)</td>
            </tr>
            <tr>
                <td>1</td>
                <td><div style="background: #fe0000; width:20px; height: 10px"></div></td>
                <td>Buruk (Skor < 80)</td>
            </tr>
        </table>
	</div>
	</div>
</section>
</div>
@endsection
