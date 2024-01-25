<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class task extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'title',
        'description',
        'cost',
        'start_date',
        'expiry_date',
        'completness',
        'created_by'
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
    public function projectDocuments(): HasMany
    {
        return $this->hasMany(TaskDocument::class);
    }
    public function projectGoal(): HasMany
    {
        return $this->hasMany(TaskGoal::class);
    }
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
