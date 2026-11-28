<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PhotoCategory;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photos';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'image',
    ];
    public function photo_category() {
        return $this->belongsTo(PhotoCategory::class, 'category_id', 'id');
    }
}
