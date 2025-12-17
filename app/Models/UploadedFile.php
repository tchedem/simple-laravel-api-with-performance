<?php
// app/Models/UploadedFile.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UploadedFile extends Model
{
    protected $fillable = [
        'upload_id',
        'original_name',
        'path',
        'size',
        'status',
    ];
}
