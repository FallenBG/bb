<?php
/**
 * Created by PhpStorm.
 * User: FallenBG
 * Date: 22-Jul-19
 * Time: 7:37 PM
 */

namespace App;


use Illuminate\Support\Arr;

trait RecordsActivity
{

    public static function bootRecordsActivity()
    {
        foreach (self::recordableEvents() as $event) {
            static::$event( function ($model) use ($event){

                $activity = $model->activityDescription($event);
                $model->recordActivity($activity);
            });
        }
    }

    /**
     * @param $model
     * @param $event
     * @return string
     */
    protected function activityDescription($activity): string
    {
//        if (class_basename($this) !== 'Project') {
            return $activity . '_' . strtolower(class_basename($this));
//        }
//        return $activity;
    }

    /**
     * @return array
     */
    public static function recordableEvents(): array
    {
        if (isset(static::$recordableEvents)) {
            return static::$recordableEvents;
        }

        return ['created', 'updated'];

    }

    /**
     * @return mixed
     */
    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject');

    }//end activity()

    /**
     * Recirds activity for everything.
     *
     * @param $activity
     */
    public function recordActivity($activity)
    {
//    dd($project);
        $this->activity()->create([
            'user_id'       => ($this->project ?? $this)->owner->id,
            'project_id'    => class_basename($this) === 'Project' ? $this->id : $this->project_id,
            'description'   => $activity,
            'changes'       => $this->activityChanges() // do record changes only if we update.
        ]);

    }

    protected function activityOwner()
    {
//        return ($this->project ?? $this)->owner;

//        $project = $this->project ?? $this;
//        return $project->owner;

//        if (class_basename($this) === 'Project') {
//            return $this->owner;
//        } else {
//            return $this->project->owner;
//        }
    }

    /**
     * writes down the changes made during the activity.
     *
     * @return array
     */
    protected function activityChanges()
    {
        if ($this->wasChanged()) {
            return [
                //                'before' => array_diff($this->original, $this->attributes),
                //                'after'  => array_diff($this->attributes, $this->original)
                'before' => Arr::except(array_diff($this->original, $this->attributes), 'updated_at'),
                'after' => Arr::except($this->getChanges(), 'updated_at')
            ];
        }
    }
}