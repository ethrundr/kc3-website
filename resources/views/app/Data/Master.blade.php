@extends('layouts.main')

@section('title', 'KC3改 Latest Master')

@section('styles')
	@parent
	<!-- <link rel="stylesheet" href="css/site/home.css" media="screen" title="no title" charset="utf-8"> -->
@endsection

@section('scripts')
	@parent
	<!-- <script src="js/site/home.js" charset="utf-8"></script> -->
@endsection

@section('content')
	{{ $master }}
	<br />
	{{ $lmdate }}
@endsection
