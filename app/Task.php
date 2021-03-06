<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

/**
 * App\Task
 *
 * @property      int $id
 * @property      int $project_id
 * @property      int $user_id
 * @property      int $completed
 * @property      string $body
 * @property      \Illuminate\Support\Carbon|null $created_at
 * @property      \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Project $project
 * @method        static \Illuminate\Database\Eloquent\Builder|\App\Task newModelQuery()
 * @method        static \Illuminate\Database\Eloquent\Builder|\App\Task newQuery()
 * @method        static \Illuminate\Database\Eloquent\Builder|\App\Task query()
 * @method        static \Illuminate\Database\Eloquent\Builder|\App\Task whereBody($value)
 * @method        static \Illuminate\Database\Eloquent\Builder|\App\Task whereCompleted($value)
 * @method        static \Illuminate\Database\Eloquent\Builder|\App\Task whereCreatedAt($value)
 * @method        static \Illuminate\Database\Eloquent\Builder|\App\Task whereId($value)
 * @method        static \Illuminate\Database\Eloquent\Builder|\App\Task whereProjectId($value)
 * @method        static \Illuminate\Database\Eloquent\Builder|\App\Task whereUpdatedAt($value)
 * @method        static \Illuminate\Database\Eloquent\Builder|\App\Task whereUserId($value)
 * @mixin         \Eloquent
 */
class Task extends Model
{
    use RecordsActivity;

    protected $guarded = [];

    // updates the other models
    protected $touches = ['project'];

    protected $casts = ['completed' => 'boolean'];

    protected static $recordableEvents = ['created', 'deleted'];


    public function project()
    {
        return $this->belongsTo(Project::class);

    }//end project()


    public function path()
    {
        return "/projects/{$this->project->id}/tasks/{$this->id}";

    }//end path()


    public function complete()
    {
        $this->update(['completed' => true]);
        $this->recordActivity('completed_task');

    }//end complete()

    /**
     *
     */
    public function incomplete()
    {
        $this->update(['completed' => false]);
        $this->recordActivity('incompleted_task');

    }//end incomplete()


}//end class
