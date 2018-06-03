@extends('include.master')
@section('title') Perencanaan Kinerja Kementerian Koordinasi Keuangan
@endsection

@section('css')
@endsection
@section('js')
<script src="/js/rkt.js"></script>
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

  @if(Auth::user() && \Session::has('role'))
  <br><button type="button" class="btn btn-info btn-md created" data-toggle="modal" data-target="#myModal">Tambah RKT</button><br><br>

  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah RKT</h4>
      </div>
      <form action="/perencanaan/rkt/tambah/{{ $unit->unitkerja_id }}" method="post">
        {{ csrf_field() }}
      <div class="modal-body">
          <div>
            <span>Pilih Parent</span>
              <select id="parent_rkt" name="parent_rkt" class="form-control">
                <option value="">Pilih Parent</option>
                @foreach($rkt as $r)
                  <option value="{{ $r->rkt_id }}">{{ $r->sasaran }}</option>
                @endforeach
              </select>
          </div><br>
          <div>
              <span>Sasaran</span>
              <input type="text" name="sasaran" id="sasaran" class="form-control" placeholder="Sasaran">
          </div><br>
          <div>
              <span>2017</span>
              <input type="text" name="2017" id="2017" class="form-control" placeholder="2017">
          </div><br>
          <div>
              <span>2018</span>
              <input type="text" name="2018" id="2018" class="form-control" placeholder="2018">
          </div><br>
          <div>
              <span>2019</span>
              <input type="text" name="2019" id="2019" class="form-control" placeholder="2019">
          </div><br>
          <div>
              <span>2020</span>
              <input type="text" name="2020" id="2020" class="form-control" placeholder="2020">
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
                        <td>
                          {{ sprintf('%02s', $no += 1) }}
                          @if(Auth::user() && \Session::has('role') && in_array("1", \Session::get('role')) ) <button type="button" class="btn btn-info btn-sm update" data-id="{{ $r->rkt_id }}" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i> Update</button>@endif
                        </td>
                        <td style="text-align:left" colspan="5">{{ $r->sasaran }}</td>
                    </tr>
                    @foreach(\App\Http\Controllers\StatikController::rkt($r->rkt_id) as $i => $child)
                    <tr>
                        <td></td>
                        <td style="text-align:left">{{ sprintf('%02s', $i += 1) }} - {{ $child->sasaran }}
                        @if(Auth::user() && \Session::has('role') && in_array("1", \Session::get('role')) ) <button type="button" class="btn btn-info btn-sm update" data-id="{{ $child->rkt_id }}" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i> Update</button>@endif</td>
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
