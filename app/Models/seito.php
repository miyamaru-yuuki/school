<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seito extends Model
{
    protected $table = 'seito';
    protected $guarded = array('seitoid');
    protected $primaryKey = 'seitoid';
    public $timestamps = false;
}