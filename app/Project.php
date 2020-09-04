<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = [
    	'projectname','clientname','assigned_members','description','startdate','duedate'
    ];

    public function members()
    {
       return $this->belongsTo('App\Member','project_id','id');
    }
}
