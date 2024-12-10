<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'category_id',
        'variant',
        'size',
        'packaging',
        'load_ability',
        'shelf_life',
        'main_image',
        'additional_images',
    ];

    /**
     * Cast attributes to specific data types.
     *
     * @var array
     */
    protected $casts = [
        'additional_images' => 'array', // For JSON array
    ];

    /**
     * Define the relationship to category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
