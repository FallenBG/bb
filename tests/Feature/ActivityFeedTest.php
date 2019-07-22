<?php

namespace Tests\Feature;

use App\Task;
use Tests\Setup\ProjectFactory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActivityFeedTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function creating_a_project_records_activity()
    {
        $project = app(ProjectFactory::class)->create();

        $this->assertCount(1, $project->activity);

        tap($project->activity->last(), function ($activity){
            $this->assertEquals('created_project', $activity->description);

            $this->assertNull($activity->changes);


        });

    }

    /** @test */
    public function updating_a_project_records_activity()
    {
        $this->withExceptionHandling();
        $project = app(ProjectFactory::class)->create();
        $originalTitle = $project->title;

        $project->update(['title' => 'Changed']);

        $this->assertEquals('updated_project', $project->activity->last()->description);
        $this->assertCount(2, $project->activity);

        tap($project->activity->last(), function ($activity) use ($originalTitle){
            $this->assertEquals('updated_project', $activity->description);
            $expected = [
                'before'    => ['title' => $originalTitle],
                'after'     => ['title' => 'Changed']
            ];

            $this->assertEquals($expected, $activity->changes);


        });
    }

    /** @test */
    public function creating_a_task_records_project_activity()
    {
        $project = app(ProjectFactory::class)->withTasks(1)->create();

        $this->assertEquals('created_task', $project->activity->last()->description);
        $this->assertCount(2, $project->activity);

        tap($project->activity->last(), function ($activity) {
            $this->assertEquals('created_task', $activity->description);
            $this->assertInstanceOf(Task::class, $activity->subject);
//            $this->assertInstanceOf('', $activity->subject->body);
            // $activity->subject gives us access to the subject params. In this case - Task.
        });
    }

//    /** @test */
//    public function updating_a_task_records_project_activity()
//    {
//        $project = app(ProjectFactory::class)->withTasks(1)->create();
//
//        $project->tasks[0]->update(['body' => 'updated']);
//
//        $this->assertEquals('updated_task', $project->activity->last()->description);
//        $this->assertCount(3, $project->activity);
//
//        tap($project->activity->last(), function ($activity) {
//            $this->assertEquals('updated_task', $activity->description);
//            $this->assertInstanceOf(Task::class, $activity->subject);
//        });
//    }

    /** @test */
    public function completing_a_task_records_project_activity()
    {
        $project = app(ProjectFactory::class)->withTasks(1)->create();

//        $project->tasks[0]->update(['completed' => 1]);
        $project->tasks->first()->complete();

        $this->assertEquals('completed_task', $project->activity->last()->description);
        $this->assertCount(3, $project->activity);

    }

    /** @test */
    public function incompleting_a_task_records_project_activity()
    {
        $project = app(ProjectFactory::class)->withTasks(1)->create();

        $this->assertDatabaseHas('tasks', ['completed' => false]);
        $project->tasks->first()->complete();
        $this->assertDatabaseHas('tasks', ['completed' => true]);

        $project->tasks->first()->incomplete();

        $this->assertEquals('incompleted_task', $project->activity->last()->description);
        $this->assertCount(4, $project->activity);

    }

    /** @test */
    public function editing_a_note_records_project_activity()
    {
        $project = app(ProjectFactory::class)->withNote()->create();

        $project->note->update(['body' => 'kur']);

        $this->assertEquals('updated_note', $project->activity->last()->description);
        $this->assertCount(2, $project->activity);

    }

    /** @test */
    public function deleting_a_task_records_project_activity()
    {
        $project = app(ProjectFactory::class)->withTasks(1)->create();

        $project->tasks->first()->delete();

        $this->assertEquals('deleted_task', $project->activity->last()->description);
        $this->assertCount(3, $project->activity);
    }

}
