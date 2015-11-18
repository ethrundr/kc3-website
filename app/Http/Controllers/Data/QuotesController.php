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
    private $quoteTitle = [ 1 =>"Intro",
                            2 => "Poke(1)",
                            3 => "Poke(2)",
                            4 => "Poke(3)",
                            5 => "Construction",
                            6 => "Repair",
                            7 => "Return",
                            8 => "Ranking",
                            9 => "Equip(1)",
                            10 => "Equip(2)",
                            11 => "Docking(1)",
                            12 => "Docking(2)",
                            13 => "Join",
                            14 => "Sortie",
                            15 => "Battle",
                            16 => "Attack",
                            17 => "Yasen(2)",
                            18 => "Yasen(1)",
                            19 => "Damaged(1)",
                            20 => "Damaged(2)",
                            21 => "Damaged(3)",
                            22 => "Sunk",
                            23 => "MVP",
                            24 => "Wedding",
                            25 => "Library",
                            26 => "Equip(3)",
                            27 => "Supply",
                            28 => "Married",
                            29 => "Idle",
                            30 => "0000",
                            31 => "0100",
                            32 => "0200",
                            33 => "0300",
                            34 => "0400",
                            35 => "0500",
                            36 => "0600",
                            37 => "0700",
                            38 => "0800",
                            39 => "0900",
                            40 => "1000",
                            41 => "1100",
                            42 => "1200",
                            43 => "1300",
                            44 => "1400",
                            45 => "1500",
                            46 => "1600",
                            47 => "1700",
                            48 => "1800",
                            49 => "1900",
                            50 => "2000",
                            51 => "2100",
                            52 => "2200",
                            53 => "2300"];

    public function getIndex() {
        $quoteCounters = QuoteCounter::orderBy('ship_id', 'asc')->get();
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
            if (($result[$ship_id][$lang]['accepted'] > 15) && ($result[$ship_id][$lang]['accepted'] <53)) {
                $result[$ship_id][$lang]['color'] = 'class=half';
            } else if ($result[$ship_id][$lang]['accepted'] >= 53) {
                $result[$ship_id][$lang]['color'] = 'class=full';
            }
        }
        return view("app/Data/Quotes", [
            'quotes' => $result
        ]);
    }

    public function showShipQuote($ship_id) {
        $shipQuotes = Quote::where('ship_id', $ship_id)->orderBy('voice_id', 'asc')->get();
        $result = Array();
        for($i = 1; $i <= 53; $i++) {
            $result[$i] = Array();
        }
        foreach ($shipQuotes as $quote) {
            //echo $quote['ship_id'].' '.$quote['voice_id'].' '.$quote['lang'].' '.$quote['content'].' '.$quote['status'].'<br>';
            $voice_id = (int) $quote['voice_id'];
            $result[$voice_id][] = $quote;
        }
        return view("app/Data/ShipQuote", [
            'quotes' => $result,
            'ship_id' => $ship_id,
            'quoteTitle' => $this->quoteTitle
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
                $newQuote->lang        = "fr";
                $newQuote->content     = $quote;
                $newQuote->status      = "Accepted";
                $newQuote->save();
            }
            $count++;
            echo "Finished ".$count."<br>";
            $this->updateCounter($ship_id, "fr");
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
