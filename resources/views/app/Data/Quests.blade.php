@extends('layouts.main')

@section('title', 'KC3改 Untranslated Quests')

@section('styles')
	@parent
	<link rel="stylesheet" href="{{asset('css/main.css')}}" media="screen"charset="utf-8">
@endsection

@section('scripts')
	@parent
	<!-- <script src="js/site/home.js" charset="utf-8"></script> -->
@endsection

@section('content')
	
	@foreach ($quests as $quest)
		<pre>
			<?php print_r($quest); ?>
		</pre>
		<hr>
	@endforeach
@endsection
