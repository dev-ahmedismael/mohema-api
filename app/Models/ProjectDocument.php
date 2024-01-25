<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectDocument extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'project_document',
        'title'
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
