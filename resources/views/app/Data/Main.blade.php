@extends('layouts.main')

@section('title', 'KC3改 Data Collection')

@section('active_data', 'class="active"')

@section('styles')
	@parent
	<link rel="stylesheet" href="{{asset('css/data/main.css')}}" media="screen" charset="utf-8">
@endsection

@section('content')
	<div class="row data-main">
		<div class="col-sm-12">
			
			<h3><a href="{{url('data/master')}}">Master Data</a></h3>
			<p>Players have the ability to contribute their master data once per gameplay session, if enabled. This is just for the KC3改 staff to get new data on new ships, new equipment and other information. This does not contain any information on your game account (does not contain ships you own, nor their current stats, instead only includes list of all ships in-game and their base stats. same goes to other categories such as equipment). This will help us act faster when there are new updates.</p>
			
			<h3><a href="{{url('data/quests')}}">Untranslated Quests</a></h3>
			<p>Players have the ability to contribute information on untranslated quests, once per specific quest, if enabled. This will let us translate quicker whenever there are new quests, and add it to the extension as soon as possible.</p>
			
			<h3><a href="{{url('data/enemies')}}">Enemy Ships</a></h3>
			<p>
				not working yet
			</p>
			
			<h3><a href="{{url('data/patterns')}}">Node Patterns</a></h3>
			<p>
				not working yet
			</p>
		</div>
	</div>
@endsection
