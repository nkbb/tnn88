<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    //
    protected $connection = 'mysql';
    protected $table = 'commission';
    protected $fillable = ['amount','revenue','member_id','user_id'];
    public $timestamps = true;

}
