@extends('include.master')
@section('title') Perencanaan Kinerja Kementerian Koordinasi Keuangan
@endsection

@section('css')
@endsection
@section('js')
@endsection
@section('content')

<section class="wrap-hero margin-bottom">
    <div id="carousel-example-ny" class="carousel carousel-hero slide" data-ride="carousel" data-interval="9000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
        	<?php
			$slides = App\Models\Slideshow::orderBy('featured')->get();
			$count1 = 0;
			?>
			@foreach($slides as $slide)
            <li data-target="#carousel-example-ny" data-slide-to="{!! $count1 !!}"></li>
			<?php $count1++;?>
            @endforeach
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @foreach($slides as $slide)
			<div class="item active">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-push-6">
                            <div class="">
                                <img src="{!! $slide->image !!}" alt="Gambar {!! $slide->judul !!}" class="img-responsive animated zoomInUp animation-delay-30">
                            </div>
                        </div>
                        <div class="col-md-6 col-md-pull-6">
                            <div class="carousel-caption">
                            	<h1 class="animated fadeInDownBig animation-delay-7 carousel-title">{!! $slide->judul !!}</h1>
                               <p class="animated zoomIn animation-delay-20">{!! $slide->dekripsi !!}</p>
                            </div>
                        </div>
                    </div> <!--row -->
                </div> <!-- container -->
            </div> <!-- item -->
			@endforeach
        </div> <!-- carousel-inner -->

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-ny" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right carousel-control" href="#carousel-example-ny" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</section> <!-- carousel -->

<div class="container">
    <section class="margin-bottom"><div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="content-box box-default animated fadeInUp animation-delay-10">
                    <span class="icon-ar icon-ar-lg icon-ar-round icon-ar-inverse"><i class="fa fa-cloud"></i></span>
                    <h4 class="content-box-title">Perencanaan Kinerja</h4>
                    <p><a href="perencanaan"class="btn btn-primary">Lihat Data Lengkap</a></p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="content-box box-default animated fadeInUp animation-delay-14">
                    <span class="icon-ar icon-ar-lg icon-ar-round icon-ar-inverse"><i class="fa fa-edit"></i></span>
                    <h4 class="content-box-title">Pengukuran Kinerja</h4>
                    <p><a href="pengukuran"class="btn btn-primary">Lihat Data Lengkap</a></p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="content-box box-default animated fadeInUp animation-delay-16">
                    <span class="icon-ar icon-ar-lg icon-ar-round icon-ar-inverse"><i class="fa fa-desktop"></i></span>
                    <h4 class="content-box-title">Pelaporan Kinerja</h4>
                    <p><a href="pelaporan"class="btn btn-primary">Lihat Data Lengkap</a></p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="content-box box-default animated fadeInUp animation-delay-12">
                    <span class="icon-ar icon-ar-lg icon-ar-round icon-ar-inverse"><i class="fa fa-flag"></i></span>
                    <h4 class="content-box-title">Evaluasi Kinerja</h4>
                    <p><a href="evaluasi"class="btn btn-primary">Lihat Data Lengkap</a></p>
                </div>
            </div>
        </div>
    </section>

    <p class="lead lead-lg text-center primary-color wow fadeIn animation-delay-3">Grand Design Kinerja <strong>Kementerian Koordinator Bidang Perekonomian</strong></p>
    <p class="lead lead-sm text-center margin-bottom wow fadeIn animation-delay-5">Put here a short description or brief highlights in your app.</p>

    <section class="margin-bottom margin-top">

        <div class="tab-content margin-top">
            <div class="tab-pane active" id="windows">
                <div class="row">
                    <div class="col-md-6 col-lg-5 col-md-push-6 col-lg-push-7">
                        <ul class="list-unstyled hand-list">
                            <li class="animated fadeInRight animation-delay-2">
                         <img src="assets/img/demo/intel.png" alt="" style="width:120px" class="img-responsive pull-left">       <h2 class="handwriting no-margin">Ideas for your product</h2>
                                <p class="lead-hand">Consectetur adipisicing elit provident tempore porro deserunt  sapiente.</p>
                            </li>
                            <li class="animated fadeInRight animation-delay-4">
                         <img src="assets/img/demo/intel.png" alt="" style="width:120px" class="img-responsive pull-left"> 
                                <h2 class="handwriting no-margin">Type here annotations</h2>
                                <p class="lead-hand">Lorem ipsum dolor sit amet, consectetur adipisicing elit provident.</p>
                            </li>
                            <li class="animated fadeInRight animation-delay-6">
                         <img src="assets/img/demo/intel.png" alt="" style="width:120px" class="img-responsive pull-left"> 
                                <h2 class="handwriting no-margin">An informal approach to design</h2>
                                <p class="lead-hand">Dlor sit amet, consectetur adipisicing elit .</p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-7 col-md-pull-6 col-lg-pull-5">
                        <img class="img-responsive animated zoomInDown animation-delay-3" src="assets/img/demo/surface.jpg">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> <!-- container -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="right-line">Gallery</h2>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="img-caption-ar wow fadeInUp">
                <img src="assets/img/demo/w1.jpg" class="img-responsive" alt="Image">
                <div class="caption-ar">
                    <div class="caption-content">
                        <a href="#" class="animated fadeInDown"><i class="fa fa-search"></i>More info</a>
                        <h4 class="caption-title">Image title</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="img-caption-ar wow fadeInUp">
                <img src="assets/img/demo/w2.jpg" class="img-responsive" alt="Image">
                <div class="caption-ar">
                    <div class="caption-content">
                        <a href="#" class="animated fadeInDown"><i class="fa fa-search"></i>More info</a>
                        <h4 class="caption-title">Image title</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="img-caption-ar wow fadeInUp">
                <img src="assets/img/demo/w3.jpg" class="img-responsive" alt="Image">
                <div class="caption-ar">
                    <div class="caption-content">
                        <a href="#" class="animated fadeInDown"><i class="fa fa-search"></i>More info</a>
                        <h4 class="caption-title">Image title</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="img-caption-ar wow fadeInUp">
                <img src="assets/img/demo/w4.jpg" class="img-responsive" alt="Image">
                <div class="caption-ar">
                    <div class="caption-content">
                        <a href="#" class="animated fadeInDown"><i class="fa fa-search"></i>More info</a>
                        <h4 class="caption-title">Image title</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="img-caption-ar wow fadeInUp">
                <img src="assets/img/demo/w5.jpg" class="img-responsive" alt="Image">
                <div class="caption-ar">
                    <div class="caption-content">
                        <a href="#" class="animated fadeInDown"><i class="fa fa-search"></i>More info</a>
                        <h4 class="caption-title">Image title</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="img-caption-ar wow fadeInUp">
                <img src="assets/img/demo/w6.jpg" class="img-responsive" alt="Image">
                <div class="caption-ar">
                    <div class="caption-content">
                        <a href="#" class="animated fadeInDown"><i class="fa fa-search"></i>More info</a>
                        <h4 class="caption-title">Image title</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section-lines">
    <div class="container">
        <div class="row">
            <div class="col-md-12 padding-40">
                <p class="slogan text-center no-margin">Discover our projects and the rigorous process of <span>creation</span>. Our principles are <span>creativity</span>, <span>design</span>, <span>experience</span> and <span>knowledge</span>. We are backed by 20 years of <span>research</span>.</p>
            </div>
        </div>
    </div>
</section>
@endsection