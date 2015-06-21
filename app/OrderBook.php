<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderBook extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orderbooks';
    public $timestamps = false;

}
