<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public const ICONS = [
        'bi bi-bank',
        'bi bi-buildings',
        'bi bi-gear-wide-connected',
        'bi bi-mortarboard-fill',
        'bi bi-building-fill-check',
        'bi bi-people-fill',
        'bi bi-building',
        'bi bi-globe2',
    ];

    public const THEMES = ['blue', 'teal', 'orange', 'purple', 'red', 'green'];

    protected $fillable = [
        'name',
        'description',
        'logo',
        'website',
        'sort_order',
        'icon',
        'theme',
    ];
}
