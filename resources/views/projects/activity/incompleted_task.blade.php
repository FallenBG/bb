{{ auth()->id() == $activity->user->id ? 'You' : $activity->user->name }} uncompleted "{{ $activity->subject->body }}"