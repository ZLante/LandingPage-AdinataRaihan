<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $fillable = ['page', 'visi', 'misi'];

    protected function casts(): array
    {
        return ['misi' => 'array'];
    }
}
