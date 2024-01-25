<?php

namespace App\Models;

use Illuminate\Console\View\Components\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskGoal extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'title',
        'description',
    ];
    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
