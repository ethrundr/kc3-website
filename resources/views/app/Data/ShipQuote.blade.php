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
<div class="row data-quotes">
    <div class="col-sm-12">
        <a href="{{url('data/quotes')}}">Back to Quote List</a>
        
        <h2>Quote List #{{ $ship_id }}</h2>
    </div>
    
    @for ($i=1; $i<=count($quoteTitle); $i++)
        <form action="{{url('data/quotes/addQuote')}}" method="POST" >
            {{ csrf_field() }}
            <div class="col-sm-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">[#{{$i}}]　{{ $quoteTitle[$i] }}</h3>
                    </div>
                    <div class="panel-body no-padding">
                        <table class="table table-bordered table-striped table-hover col-sm-12 no-margin" id="quote-table">
                            <thead>
                                <tr>
                                    <th width="80px">Language</th>
                                    <th>Content</th>
                                    <th width="80px">Status</th>
                                    <th width="130px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quotes[$i] as $key => $quote)
                                    <tr>
                                        <td>{{ $quote['lang'] }}</td>
                                        <td>{{ $quote['content'] }}</td>
                                        <td class="{{ $quote['status'] }}">{{ $quote['status'] }}</td>
                                        <td>
                                            @if ($quote['status'] == 'Pending')
                                                <a class="btn btn-success btn-xs" href="{{url('data/quotes/accept/')}}/{{$quote['id']}}">Accept</a>
                                            @else
                                                <a class="btn btn-warning btn-xs" href="{{url('data/quotes/pend/')}}/{{$quote['id']}}">Pend</a>
                                            @endif
                                            <a class="btn btn-danger btn-xs remove-quote-btn" href="{{url('data/quotes/delete/')}}/{{$quote['id']}}">Remove</a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>
                                        <select class="form-control" name="lang" id="lang">
                                            <option value="de">de</option>
                                            <option value="en">en</option>
                                            <option value="es">es</option>
                                            <option value="fr">fr</option>
                                            <option value="id">id</option>
                                            <option value="it">it</option>
                                            <option value="jp">jp</option>
                                            <option value="kr">kr</option>
                                            <option value="nl">nl</option>
                                            <option value="pt">pt</option>
                                            <option value="ru">ru</option>
                                            <option value="scn">scn</option>
                                            <option value="tcn">tcn</option>
                                            <option value="th">th</option>
                                            <option value="vi">vi</option>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <input class="form-control" type="hidden" name="ship_id" id="ship_id" value="{{$ship_id}}"></input>
                                        <input class="form-control" type="hidden" name="voice_id" id="voice_id" value="{{$i}}"></input>
                                        <input class="form-control" name="content" id="content" rows="1"></input>
                                    </td>
                                    <td>
                                        <button class="form-control btn btn-primary" type="submit">Submit</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    @endfor
</div>
@endsection
