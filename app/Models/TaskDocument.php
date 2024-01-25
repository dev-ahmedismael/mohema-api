<?php

namespace App\Models;

use Illuminate\Console\View\Components\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'task_document',
        'title'
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
