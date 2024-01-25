<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_logo'
    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
    public function pendingUser(): HasMany
    {
        return $this->hasMany(PendingUser::class);
    }
    public function company_goal(): HasMany
    {
        return $this->hasMany(CompanyGoal::class);
    }
    public function project(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
