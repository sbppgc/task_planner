<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'performer_id',
        'status',
        'description',
    ];

    /**
     * Get the performer record associated with the task.
     */
    public function performer()
    {
        return $this->belongsTo('App\Performer')->withDefault([
            'name' => '-deleted-',
        ]);
    }

}
