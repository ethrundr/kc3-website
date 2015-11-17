<?php

namespace App\Http\Controllers\Data;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Quote;

class QuotesController extends Controller {
    
    public function getIndex() {
        $quotes = Quote::orderBy('id', 'asc')->get();
        return view("app/Data/Quotes", [
            'quotes' => $quotes
        ]);
    }

    public function submitQuote(Request $request) {
        $quote = new Quote;
        $quote->ship_id     = $request->ship_id;
        $quote->voice_id    = $request->voice_id;
        $quote->lang        = $request->lang;
        $quote->content     = $request->content;
        $quote->save();
        return redirect('/data/quotes');
    }
}
