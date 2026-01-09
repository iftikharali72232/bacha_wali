<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    const CONTACT_META_KEYS = [
        'phone' => 'Phone',
        'email' => 'Email',
        'address' => 'Address',
        'hours' => 'Service hours',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'slug',
        'title',
        'headline',
        'summary',
        'body',
        'cta_label',
        'cta_url',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function metaValue(string $key, string $fallback = ''): string
    {
        return (string) ($this->meta[$key] ?? $fallback);
    }
}
