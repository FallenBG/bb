<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $guarded = [];


    public function project()
    {
        return $this->belongsTo(Project::class);

    }//end project()


    public function path()
    {
        return "/projects/{$this->project->id}/note/{$this->id}";

    }//end path()


}//end class
