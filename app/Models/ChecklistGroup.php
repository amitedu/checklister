<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $validated)
 */
class ChecklistGroup extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function checklists(): HasMany
    {
        return $this->hasMany(Checklist::class);
    }
}
