<?php

namespace App\Models;

use Illuminate\Console\View\Components\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'title',
        'description',
        'logo',
        'start_date',
        'expiry_date',
        'completness',
        'created_by'
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    public function projectDocuments(): HasMany
    {
        return $this->hasMany(ProjectDocument::class);
    }
    public function projectGoal(): HasMany
    {
        return $this->hasMany(ProjectGoal::class);
    }
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function req(): HasMany
    {
        return $this->hasMany(Req::class);
    }

    public function resource(): HasMany
    {
        return $this->hasMany(Resource::class);
    }
}
