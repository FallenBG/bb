<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Tests\Feature\ActivityFeedTest;
use Tests\Unit\NoteTest;

/**
 * App\Project
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $owner_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereUpdatedAt($value)
 * @property-read \App\User $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Task[] $tasks
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereOwnerId($value)
 */
class Project extends Model
{
    //
//    protected $fillable = ['title', 'description'];
    protected $guarded = [];

    public function path()
    {
        return "/projects/" . $this->id;
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($data)
    {
//        dd($data);
        return $this->tasks()->create($data);
    }

    public function addNote($data)
    {
//        dd($data);
        return $this->note()->create($data);
    }

    public function note()
    {
        return $this->hasOne(Note::class);
    }

    public function activity()
    {
        return $this->hasMany(Activity::class);
    }


    public function recordActivity($activity)
    {
        Activity::create([
            'project_id' => $this->id,
            'description' => $activity
        ]);
    }
}
