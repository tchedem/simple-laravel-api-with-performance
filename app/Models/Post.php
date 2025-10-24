<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Testing\Fluent\Concerns\Has;

class Post extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $guaded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id', 'user');
    }
}
