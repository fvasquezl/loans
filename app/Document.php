<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Document extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($document) {
            Storage::disk('public')->delete($document->url);
        });

    }
}
