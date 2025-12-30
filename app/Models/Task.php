<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    public const PER_PAGE_DEFAULT = 10;
    public const PER_PAGE_MAX = 20;

    protected $table = 'tasks';

    protected $primaryKey = 'id';

    protected $guarded = [];

    // ATTRIBUTES
    protected $appends = [
        // 'assigned_to_name',
        'short_description',
        // 'is_assigned',
    ];

    protected function description(): Attribute
    {
        return Attribute::make(
            // Accessors
            // get: fn (string $value) => ucfirst(strtolower($value)),
            get: fn (string $value) => strtolower($value),

            // Mutators
            set: fn (string $value) => strtolower($value),
        );
    }

    // public function getAssignedToNameAttribute()
    // {
    //     return $this->assigned_to ? User::find($this->assigned_to)?->name : null;
    // }

    public function getShortDescriptionAttribute()
    {
        // $description = $this->description;
        $description = $this->getRawOriginal('description');

        return strlen($description) > 30 ? substr($description, 0, 30) . '...' : $description;
    }

    // public function getIsAssignedAttribute()
    // {
    //     return $this->assigned_to !== null;
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
