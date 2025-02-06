<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arrete extends Model
{
    protected $fillable = [
        'title',        // Ajoutez 'title' ici
        'category_id',  // Ajoutez 'category_id' si vous l'utilisez
        'file_path',    // Ajoutez 'file_path' si vous l'utilisez
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}
