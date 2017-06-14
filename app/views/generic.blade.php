@extends('layouts.base')
@section('generic')
<!--Start Container-->
<div id="main" class="container-fluid">
    <div class="row">
    		@include('layouts.sidebar')
        <!--Start Content-->
        <div id="content" class="col-xs-12 col-sm-10">
        	<div class="preloader">
				<img src="img/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/>
			</div>
			<div id="ajax-content"></div>
        </div>
        <!--End Content-->
    </div>
</div>
<!--End Container-->
@stop