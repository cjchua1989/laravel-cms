<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Content extends Model
{
    protected $keyType = 'string';

    use HasFactory;

    protected $fillable = [
        'id',
        'slug',
        'name',
        'content',
        'type',
        'metas',
        'description',
        'thumbnail',
    ];

    public function getThumbnailUrlAttribute() {
        return Storage::url($this->thumbnail);
    }

    public function getHasThumbnailAttribute() {
        return !empty($this->thumbnail);
    }
}
