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
        
        <h2>Quote List</h2>
    </div>
    
    <table class="table table-bordered table-striped col-sm-12">
        <thead>
            <tr>
                <td>Id</td>
                <td>Ship Id</td>
                <td>Voice Id</td>
                <td>Language</td>
                <td>Content</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                @if (count($quotes) > 0)
                    @foreach ($quotes as $quote)
                        <tr>
                            <td>{{ $quote->id }}</td>
                            <td>{{ $quote->ship_id }}</td>
                            <td>{{ $quote->voice_id }}</td>
                            <td>{{ $quote->lang }}</td>
                            <td>{{ $quote->content }}</td>
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
