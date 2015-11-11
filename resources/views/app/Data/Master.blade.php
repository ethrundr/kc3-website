@extends('layouts.main')

@section('title', 'KC3改 Latest Master')

@section('active_data', 'class="active"')

@section('styles')
	@parent
	<link rel="stylesheet" href="{{asset('css/data/master.css')}}" media="screen" charset="utf-8">
@endsection

@section('content')
	<div class="row data-master">
		<div class="col-sm-12">
			<a href="{{url('data')}}">Back to Data Collection</a>
			
			<h2>Master Data</h2>
			
			<p>Last contribution: <strong>{{ date("F j, Y - H:i:s", $lmdate) }}</strong></p>
			
			<hr />
			
			<textarea class="master_json" READONLY>{{$master}}</textarea>
		</div>
	</div>
@endsection
