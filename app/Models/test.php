<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'test';
    protected $guarded = array('tid');
    protected $primaryKey = 'tid';
    public $timestamps = false;
}