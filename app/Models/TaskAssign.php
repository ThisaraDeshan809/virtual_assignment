<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskAssign extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'task_id',
        'start_at',
        'finished_at',
        'deadline_at',
        'remark',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
