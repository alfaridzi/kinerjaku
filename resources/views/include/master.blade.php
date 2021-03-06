<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title> @yield('title')</title>
	@include('include.header')
	@yield('css')
</head>
<body>
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<div id="agm-configurator">
    <div id="agm-configurator-content">
        <div class="panel-group" id="accordion-conf" role="tablist" aria-multiselectable="true">
            <!-- collapse panel -->
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <a role="button" data-toggle="collapse" data-parent="#accordion-conf" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                        Color Selector
                    </a>
                </div>
                <div id="collapseOne1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <div id="color-options">
                            <a href="javascript:void(0);" rel="style-blue.css" class="color-box color-blue">blue</a>
                            <a href="javascript:void(0);" rel="style-blue2.css" class="color-box color-blue2">blue2</a>
                            <a href="javascript:void(0);" rel="style-blue3.css" class="color-box color-blue3">blue3</a>
                            <a href="javascript:void(0);" rel="style-blue4.css" class="color-box color-blue4">blue4</a>
                            <a href="javascript:void(0);" rel="style-blue5.css" class="color-box color-blue5">blue5</a>
                            <a href="javascript:void(0);" rel="style-green.css" class="color-box color-green">green</a>
                            <a href="javascript:void(0);" rel="style-green2.css" class="color-box color-green2">green2</a>
                            <a href="javascript:void(0);" rel="style-green3.css" class="color-box color-green3">green3</a>
                            <a href="javascript:void(0);" rel="style-green4.css" class="color-box color-green4">green4</a>
                            <a href="javascript:void(0);" rel="style-green5.css" class="color-box color-green5">green5</a>
                            <a href="javascript:void(0);" rel="style-red.css" class="color-box color-red">red</a>
                            <a href="javascript:void(0);" rel="style-red2.css" class="color-box color-red2">red2</a>
                            <a href="javascript:void(0);" rel="style-red3.css" class="color-box color-red3">red3</a>
                            <a href="javascript:void(0);" rel="style-fuchsia.css" class="color-box color-fuchsia">fuchsia</a>
                            <a href="javascript:void(0);" rel="style-pink.css" class="color-box color-pink">pink</a>
                            <a href="javascript:void(0);" rel="style-yellow.css" class="color-box color-yellow">yellow</a>
                            <a href="javascript:void(0);" rel="style-yellow2.css" class="color-box color-yellow2">yellow2</a>
                            <a href="javascript:void(0);" rel="style-orange.css" class="color-box color-orange">orange</a>
                            <a href="javascript:void(0);" rel="style-orange2.css" class="color-box color-orange2">orange2</a>
                            <a href="javascript:void(0);" rel="style-orange3.css" class="color-box color-orange3">orange3</a>
                            <a href="javascript:void(0);" rel="style-violet.css" class="color-box color-violet">violet</a>
                            <a href="javascript:void(0);" rel="style-violet2.css" class="color-box color-violet2">violet2</a>
                            <a href="javascript:void(0);" rel="style-violet3.css" class="color-box color-violet3">violet3</a>
                            <a href="javascript:void(0);" rel="style-aqua.css" class="color-box color-aqua">aqua</a>
                            <a href="javascript:void(0);" rel="style-gray.css" class="color-box color-gray">gray</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- collapse panel -->
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <a role="button" data-toggle="collapse" data-parent="#accordion-conf" href="#collapseTwo2" aria-expanded="true" aria-controls="collapseTwo2" class="collapsed">
                        Header Options
                    </a>
                </div>
                <div id="collapseTwo2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <h5>Header Style</h5>
                        <form id="header-option">
                            <div class="radio radio-dark">
                                <input type="radio" name="headerRadio" id="header-full-radio" value="header-full" checked>
                                <label for="header-full-radio">Light Header</label>
                            </div>
                            <div class="radio radio-dark">
                                <input type="radio" name="headerRadio" id="header-full-dark-radio" value="header-full-dark">
                                <label for="header-full-dark-radio">Dark Header</label>
                            </div>
                            <div class="radio radio-dark">
                                <input type="radio" name="headerRadio" id="no-header-radio" value="no-header">
                                <label for="no-header-radio">No Header (Navbar mode)</label>
                            </div>
                        </form>
                        <h5>Navbar Color</h5>
                        <form id="navbar-option">
                            <div class="radio radio-dark">
                                <input type="radio" name="navbarRadio" id="navbar-light-radio" value="navbar-light">
                                <label for="navbar-light-radio">Light Color</label>
                            </div>
                            <div class="radio radio-dark">
                                <input type="radio" name="navbarRadio" id="navbar-dark-radio" value="navbar-dark" checked>
                                <label for="navbar-dark-radio">Dark Color</label>
                            </div>
                            <div class="radio radio-dark">
                                <input type="radio" name="navbarRadio" id="navbar-inverse-radio" value="navbar-inverse">
                                <label for="navbar-inverse-radio">Primary Color</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- collapse panel -->
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                    <a role="button" data-toggle="collapse" data-parent="#accordion-conf" href="#collapseThree3" aria-expanded="true" aria-controls="collapseThree3" class="collapsed">
                        Container Options
                    </a>
                </div>
                <div id="collapseThree3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                        <form id="container-option">
                            <div class="radio radio-dark">
                                <input type="radio" name="containerRadio" id="width-boxed-radio" value="width-boxed">
                                <label for="width-boxed-radio">Boxed Container</label>
                            </div>
                            <div class="radio radio-dark">
                                <input type="radio" name="containerRadio" id="width-full-radio" value="width-full" checked>
                                <label for="width-full-radio">Full Width Container</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div id="agm-configurator-button">
        <button type="button" name="button" id="agm-configurator-btn"><i class="fa fa-gear"></i></button>
    </div>
</div>
<div class="sb-site-container">
<div class="boxed">
@include('include.nav')

@yield('content')
@include('include.foot')

</div> <!-- boxed -->
</div> <!-- sb-site -->
@include('include.side')
<!-- sb-slidebar sb-right -->
<div id="back-top">
    <a href="#header"><i class="fa fa-chevron-up"></i></a>
</div>
@include('include.footer')
@yield('js')
</body>
</html>
