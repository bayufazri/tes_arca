<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Bonus extends Model
{
    use SoftDeletes;
    protected $table = "bonus";
    protected $fillable = ([
        'nama','pembayaran','bonus','total_bonus'
    ]);
}
