@extends('layouts.main')

@section('title', 'KC3改 Subtitle')

@section('active_data', 'class="active"')

@section('styles')
    @parent
    <link rel="stylesheet" href="{{asset('css/data/ship-quote.css')}}" media="screen" charset="utf-8">
@endsection

@section('scripts')
    @parent
    <script type="text/javascript" src="{{asset('js/ship-quote.js')}}"></script>
@endsection

@section('content')
<div class="row data-quests">
    <div class="col-sm-12">
        <a href="{{url('data/quotes')}}">Back to Quote List</a>
        
        <h2>Quote List #{{ $ship_id }}</h2>
    </div>
    
    <table class="table table-bordered table-striped table-hover col-sm-12" id="quote-table">
        <thead>
            <tr>
                <th>Quote</th>
                <th>Language</th>
                <th>Content</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @for ($i=1; $i<=53; $i++)
                @forelse ($quotes[$i] as $key => $quote)
                    <tr>
                        @if ($key == 0)
                            <th rowspan="{{count($quotes[$i])}}">{{ $quoteTitle[$quote['voice_id']] }} [#{{$quote['voice_id']}}]</th>
                        @endif
                        <td>{{ $quote['lang'] }}</td>
                        <td>{{ $quote['content'] }}</td>
                        <td>{{ $quote['status'] }}</td>
                        <td>aaa</td>
                    </tr>
                @empty
                    <tr>
                        <th>{{ $quoteTitle[$i] }} [#{{$i}}]</th>
                        <td colspan="4">Empty!!!</td>
                    </tr>
                @endforelse
            @endfor
        </tbody>
    </table>
    
    <form action="quotes/addQuote" method="POST" class="form-horizontal col-sm-6">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="task" class="col-sm-2 control-label">Ship Id</label>
            <div class="col-sm-10">
                <input type="text" name="ship_id" id="ship_id" class="form-control" disabled="disabled" value="{{ $ship_id }}">
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
