<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $fillable = [
    	'membertname','designation','description','profileimage'
    ];

    public function product()
    {
       return $this->hasMany('App\Project','assigned_members','id');
    }
}
