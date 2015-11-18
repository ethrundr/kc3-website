@extends('layouts.main')

@section('title', 'KC3改 Subtitle')

@section('active_data', 'class="active"')

@section('styles')
    @parent
    <link rel="stylesheet" href="{{asset('css/data/quests.css')}}" media="screen" charset="utf-8">
@endsection

@section('content')
<div class="row data-quests">
    <div class="col-sm-12">
        <a href="{{url('data')}}">Back to Data Collection</a>
        
        <h2>Quote List (Accepted/Pending)</h2>
    </div>
    
    <table class="table table-bordered table-striped col-sm-12">
        <thead>
            <tr>
                <th>Ship Id</th>
                <th>de</th>
                <th>en</th>
                <th>es</th>
                <th>fr</th>
                <th>id</th>
                <th>it</th>
                <th>jp</th>
                <th>kr</th>
                <th>nl</th>
                <th>pt</th>
                <th>ru</th>
                <th>scn</th>
                <th>tcn</th>
                <th>th</th>
                <th>vi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @if (count($quotes) > 0)
                    @foreach ($quotes as $ship_id => $quote)
                        <tr>
                            <th>{{ $ship_id }}</th>
                            <td {{ $quote['de']['color'] }}>{{ $quote['de']['accepted'] }}/{{ $quote['de']['pending'] }}</td>
                            <td {{ $quote['en']['color'] }}>{{ $quote['en']['accepted'] }}/{{ $quote['en']['pending'] }}</td>
                            <td {{ $quote['es']['color'] }}>{{ $quote['es']['accepted'] }}/{{ $quote['es']['pending'] }}</td>
                            <td {{ $quote['fr']['color'] }}>{{ $quote['fr']['accepted'] }}/{{ $quote['fr']['pending'] }}</td>
                            <td {{ $quote['id']['color'] }}>{{ $quote['id']['accepted'] }}/{{ $quote['id']['pending'] }}</td>
                            <td {{ $quote['it']['color'] }}>{{ $quote['it']['accepted'] }}/{{ $quote['it']['pending'] }}</td>
                            <td {{ $quote['jp']['color'] }}>{{ $quote['jp']['accepted'] }}/{{ $quote['jp']['pending'] }}</td>
                            <td {{ $quote['kr']['color'] }}>{{ $quote['kr']['accepted'] }}/{{ $quote['kr']['pending'] }}</td>
                            <td {{ $quote['nl']['color'] }}>{{ $quote['nl']['accepted'] }}/{{ $quote['nl']['pending'] }}</td>
                            <td {{ $quote['pt']['color'] }}>{{ $quote['pt']['accepted'] }}/{{ $quote['pt']['pending'] }}</td>
                            <td {{ $quote['ru']['color'] }}>{{ $quote['ru']['accepted'] }}/{{ $quote['ru']['pending'] }}</td>
                            <td {{ $quote['scn']['color'] }}>{{ $quote['scn']['accepted'] }}/{{ $quote['scn']['pending'] }}</td>
                            <td {{ $quote['tcn']['color'] }}>{{ $quote['tcn']['accepted'] }}/{{ $quote['tcn']['pending'] }}</td>
                            <td {{ $quote['th']['color'] }}>{{ $quote['th']['accepted'] }}/{{ $quote['th']['pending'] }}</td>
                            <td {{ $quote['vi']['color'] }}>{{ $quote['vi']['accepted'] }}/{{ $quote['vi']['pending'] }}</td>
                        </tr>
                    @endforeach
                @else
                    <td colspan="5">Empty!!!</td>
                @endif
            </tr>
        </tbody>
    </table>
    
    <form action="quotes/addQuote" method="POST" class="form-horizontal col-sm-6">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="task" class="col-sm-2 control-label">Ship Id</label>
            <div class="col-sm-10">
                <input type="text" name="ship_id" id="ship_id" class="form-control">
            </div>
            <label for="task" class="col-sm-2 control-label">Voice Id</label>
            <div class="col-sm-10">
                <input type="text" name="voice_id" id="voice_id" class="form-control">
            </div>
            <label for="task" class="col-sm-2 control-label">Language</label>
            <div class="col-sm-10">
                <input type="text" name="lang" id="lang" class="form-control">
            </div>
            <label for="task" class="col-sm-2 control-label">Content</label>
            <div class="col-sm-10">
                <input type="text" name="content" id="content" class="form-control">
            </div>
        </div>

        <!-- Add Quote Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Add Quote
                </button>
            </div>
        </div>
    </form>

</div>
@endsection
