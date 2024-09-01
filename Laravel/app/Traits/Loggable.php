<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

trait Loggable
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        $className = Str::after(get_class($this), 'Models\\');

        return LogOptions::defaults()
            ->logAll()
            ->useLogName($className);
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        $class = Str::after(get_class($this), 'Models\\');

        return "{$class} has been {$eventName} By ".(auth()->user()?->email ?? 'Migration');
    }

    public function logs()
    {
        return $this->morphMany(Activity::class, 'subject');
    }
}
