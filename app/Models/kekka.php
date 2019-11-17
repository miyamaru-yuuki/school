<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kekka extends Model
{
    protected $table = 'kekka';
    protected $guarded = array('kid');
    protected $primaryKey = 'kid';
    public $timestamps = false;
}