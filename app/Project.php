<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Tests\Feature\ActivityFeedTest;
use Tests\Unit\NoteTest;

/**
 * App\Project
 *
 * @method        static \Illuminate\Database\Eloquent\Builder|\App\Project newModelQuery()
 * @method        static \Illuminate\Database\Eloquent\Builder|\App\Project newQuery()
 * @method        static \Illuminate\Database\Eloquent\Builder|\App\Project query()
 * @mixin         \Eloquent
 * @property      int $id
 * @property      string $title
 * @property      string $description
 * @property      int $owner_id
 * @property      \Illuminate\Support\Carbon|null $created_at
 * @property      \Illuminate\Support\Carbon|null $updated_at
 * @method        static \Illuminate\Database\Eloquent\Builder|\App\Project whereCreatedAt($value)
 * @method        static \Illuminate\Database\Eloquent\Builder|\App\Project whereDescription($value)
 * @method        static \Illuminate\Database\Eloquent\Builder|\App\Project whereId($value)
 * @method        static \Illuminate\Database\Eloquent\Builder|\App\Project whereTitle($value)
 * @method        static \Illuminate\Database\Eloquent\Builder|\App\Project whereUpdatedAt($value)
 * @property-read \App\User $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Task[] $tasks
 * @method        static \Illuminate\Database\Eloquent\Builder|\App\Project whereOwnerId($value)
 */
class Project extends Model
{
    use RecordsActivity;
    //
    // protected $fillable = ['title', 'description'];
    protected $guarded = [];

//    public $old = [];


    public function path()
    {
        return "/projects/".$this->id;

    }//end path()


    public function owner()
    {
        return $this->belongsTo(User::class);

    }//end owner()


    public function tasks()
    {
        return $this->hasMany(Task::class);

    }//end tasks()


    public function addTask($data)
    {
        // dd($data);
        return $this->tasks()->create($data);

    }//end addTask()


    public function addNote($data)
    {
        // dd($data);
        return $this->note()->create($data);

    }//end addNote()


    public function note()
    {
        return $this->hasOne(Note::class);

    }//end note()

    public function activity()
    {
        return $this->hasMany(Activity::class);

    }//end activity()

    public function invite($user)
    {
        return $this->members()->attach($user);

    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'project_members');

    }


}//end class
