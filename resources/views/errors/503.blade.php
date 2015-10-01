@extends('layouts.bare')

@section('title', 'KC3改 Site Maintenance')

@section('styles')
	@parent
    <link rel="stylesheet" href="css/errors.css" media="screen" charset="utf-8"> 
	<style media="screen">
		body { background:#D75048; }
	</style>
@endsection

@section('content')
<div class="e503">
	<div class="container-fluid banner">
		<div class="container">
			<div class="row">
				<div class="col-xs-11 col-xs-push-1 message title">
					Unavailable
				</div>
			</div>
			<div class="row">
				<div class="col-xs-11 col-xs-push-1 message description">
					The website is under maintenance.
				</div>
			</div>
		</div>
	</div>
	<div class="container moreLinks">
		<div class="row">
			<div class="col-xs-12 message">In the mean time.. enjoy content from these other links:</div>
		</div>
		<div class="row">
			<div class="col-xs-3"><div class="linkBox">
				1234
			</div></div>
			<div class="col-xs-3"><div class="linkBox">
				1234
			</div></div>
			<div class="col-xs-3"><div class="linkBox">
				1234
			</div></div>
			<div class="col-xs-3"><div class="linkBox">
				1234
			</div></div>
		</div>
	</div>
</div>
@endsection
