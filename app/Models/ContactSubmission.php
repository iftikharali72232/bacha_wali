<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'mobile',
        'email',
        'description',
        'attachments',
    ];

    protected $casts = [
        'attachments' => 'array',
    ];
}
