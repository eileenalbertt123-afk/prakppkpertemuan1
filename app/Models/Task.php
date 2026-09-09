<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'list_id',
        'title',
        'description',
        'priority',
        'deadline',
        'status',
    ];
}