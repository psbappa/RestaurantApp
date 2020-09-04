<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectMembers extends Model
{
    protected $table = 'project_members';
    protected $fillable = [
    	'project_id','member_id'
    ];

    public function product()
    {
       return $this->hasMany('App\Project','project_id','id');
    }
}
