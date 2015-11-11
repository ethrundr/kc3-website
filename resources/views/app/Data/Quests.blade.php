@extends('layouts.main')

@section('title', 'KC3改 Untranslated Quests')

@section('active_data', 'class="active"')

@section('styles')
	@parent
	<link rel="stylesheet" href="{{asset('css/data/quests.css')}}" media="screen" charset="utf-8">
@endsection

@section('content')
<div class="row data-quests">
	<div class="col-sm-12">
		<a href="{{url('data')}}">Back to Data Collection</a>
		
		<h2>Untranslated Quests</h2>
	</div>
	
	@foreach ($quests as $quest)
		<div class="col-sm-12 quest_box">
			<div class="col-sm-2 quest_no">{{$quest->api_no}}</div>
			<div class="col-sm-10 quest_info">
				<div class="quest_title">{{$quest->api_title}}</div>
				<div class="quest_description">{{$quest->api_detail}}</div>
				<div class="quest_json">
					<textarea READONLY>{{json_encode($quest)}}</textarea>
				</div>
			</div>
		</div>
	@endforeach
	
</div>
@endsection
