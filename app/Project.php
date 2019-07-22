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
    //
    // protected $fillable = ['title', 'description'];
    protected $guarded = [];

    public $old = [];


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


    public function recordActivity($activity)
    {
        $this->activity()->create([
            'description'   => $activity,
            'changes'       => $this->activityChanges($activity) // do record changes only if we update.
        ]);

    }//end recordActivity()


    protected function activityChanges($activity)
    {
        if ($activity !== 'updated') {
            return null;
        }

        return [
//                'before' => array_diff($this->original, $this->attributes),
//                'after'  => array_diff($this->attributes, $this->original)
            'before' => Arr::except(array_diff($this->original, $this->attributes), 'updated_at'),
            'after'  => Arr::except($this->getChanges(), 'updated_at')
        ];
    }


}//end class
