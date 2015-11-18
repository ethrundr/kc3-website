<?php

namespace App\Http\Controllers\Data;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Quote;
use App\Models\QuoteCounter;
use Storage;

class QuotesController extends Controller {
    
    private $languageList = ["de", "en", "es", "fr", "id", "it", "jp", "kr", "nl", "pt", "ru", "scn", "tcn", "th", "vi"];

    public function getIndex() {
        $quoteCounters = QuoteCounter::get();
        $result = array();

        foreach($quoteCounters as $quoteCounter) {
            $ship_id = $quoteCounter['ship_id'];
            $lang = $quoteCounter['lang'];
            if (!array_key_exists($ship_id , $result)) {
                $result[$ship_id] = array();
                foreach($this->languageList as $language) {
                    $result[$ship_id][$language] = array();
                    $result[$ship_id][$language]['accepted'] = 0;
                    $result[$ship_id][$language]['pending'] = 0;
                    $result[$ship_id][$language]['color'] = "";
                }
            }
            $result[$ship_id][$lang]['accepted'] = $quoteCounter['accepted'];
            $result[$ship_id][$lang]['pending'] = $quoteCounter['pending'];
            if ($result[$ship_id][$lang]['accepted'] > 15) {
                $result[$ship_id][$lang]['color'] = 'class=warning';
            } else if ($result[$ship_id][$lang]['accepted'] >= 53) {
                $result[$ship_id][$lang]['color'] = 'class=success';
            }
        }
        return view("app/Data/Quotes", [
            'quotes' => $result
        ]);
    }

    public function updateCounter($ship_id, $lang) {
        $acceptedQuotes = Quote::where('ship_id', $ship_id)
                            ->where('lang', $lang)
                            ->where('status', 'Accepted')->get();
        $pendingQuotes = Quote::select('ship_id', 'lang')
                            ->where('ship_id', $ship_id)
                            ->where('lang', $lang)
                            ->where('status', 'Pending')->get();
        $quoteCounter = QuoteCounter::where('ship_id', $ship_id)
                                        ->where('lang', $lang)->get();
        if (count($quoteCounter) > 0) {
            QuoteCounter::where('ship_id', $ship_id)
                        ->where('lang', $lang)
                        ->update(['accepted' => count($acceptedQuotes), 
                                  'pending' => count($pendingQuotes)]);
        } else {
            $quoteCounter = new QuoteCounter;
            $quoteCounter->ship_id = $ship_id;
            $quoteCounter->lang = $lang;
            $quoteCounter->accepted = count($acceptedQuotes);
            $quoteCounter->pending = count($pendingQuotes);
            $quoteCounter->save();
        }
    }

    public function submitQuote(Request $request) {
        $quote = new Quote;
        $quote->ship_id     = $request->ship_id;
        $quote->voice_id    = $request->voice_id;
        $quote->lang        = $request->lang;
        $quote->content     = $request->content;
        $quote->status      = "Accepted";
        $quote->save();

        $this->updateCounter($quote->ship_id, $quote->lang);
        return redirect('/data/quotes');
    }

    public function import() {
        //echo "aaaaaaa";
        $quotesData = json_decode(Storage::get('quotes.json'), true);
        //echo $quotesData["1"]["1"];
        $count = 0;

        foreach($quotesData as $ship_id => $quoteArray) {
            foreach($quoteArray as $voice_id => $quote) {
                //echo $ship_id." ".$voice_id." ".$quote."<br>";
                $newQuote = new Quote;
                $newQuote->ship_id     = $ship_id;
                $newQuote->voice_id    = $voice_id;
                $newQuote->lang        = "en";
                $newQuote->content     = $quote;
                $newQuote->status      = "Accepted";
                $newQuote->save();
            }
            $count++;
            echo "Finished ".$count."<br>";
            $this->updateCounter($ship_id, "en");
        }

        /*
        while (current($quotesData)) {
            $ship_id = key($quotesData);
            $quoteArray = $quotesData[$ship_id];
            while (current($quoteArray)) {
                $voice_id = key($quoteArray);
                echo $ship_id." ".$voice_id." ".$quoteArray[$voice_id]."<br>";

                $newQuote = new Quote;
                $newQuote->ship_id     = $ship_id;
                $newQuote->voice_id    = $voice_id;
                $newQuote->lang        = "en";
                $newQuote->content     = $quoteArray[$voice_id];
                //$newQuote->save();

                next($quoteArray);
            }
            $count++;
            echo "Finished ".$count."<br>";
            next($quotesData);
        }*/

        /*foreach($quotesData as $shipQuoteData){
            foreach($shipQuoteData as $quote){
                echo $quote.'<br>';
            }
            /*$newQuote = new Quote;
            $newQuote->ship_id     = $quote->ship_id;
            $newQuote->voice_id    = $request->voice_id;
            $newQuote->lang        = $request->lang;
            $newQuote->content     = $request->content;*/
            //$newQuote->save();
        //}
        
        /*return view("app/Data/Quests", [
            'quests' => $quests,
        ]);

        $quote = new Quote;
        $quote->ship_id     = $request->ship_id;
        $quote->voice_id    = $request->voice_id;
        $quote->lang        = $request->lang;
        $quote->content     = $request->content;
        $quote->save();*/
        return redirect('/data/quotes');
    }
}
