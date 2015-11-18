<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteCounter extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ship_id', 'lang', 'accepted', 'pending'];
    protected $table = 'quote_counters';
}
