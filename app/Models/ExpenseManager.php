<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseManager extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'marchant',
        'status',
        'total',
        'date_applied'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'comment' => 'string',
        'marchant' => 'string',
        'status' => 'string',
        'total' => 'integer',
        'date_applied' => 'date'
    ];
}
