<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $connection = 'mysql';
    protected $table = 'member';
    protected $fillable = ['name','phone','status','parent_id','user_id'];
    public $timestamps = true;

}
