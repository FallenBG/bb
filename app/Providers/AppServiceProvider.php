<?php

namespace App\Providers;

//use App\Note;
//use App\Observers\NoteObserver;
//use App\Observers\ProjectObserver;
//use App\Observers\TaskObserver;
//use App\Project;
//use App\Task;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        // if ($this->app->environment() != 'testing') {
        // $this->app->register(TelescopeServiceProvider::class);
        // }
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

    }//end register()


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
//        Project::observe(ProjectObserver::class);
//        Task::observe(TaskObserver::class);
//        Note::observe(NoteObserver::class);

    }//end boot()


}//end class
