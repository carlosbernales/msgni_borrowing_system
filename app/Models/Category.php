<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $primaryKey = 'id';

    public $incrementing = true;

    // Specify if the primary key is not an integer
    // protected $keyType = 'string';

    // If you don't want Laravel to manage timestamps, set this to false
    // public $timestamps = false;

    // Define the fillable attributes (mass assignable)
    protected $fillable = [
                            'cat_name', 
                        ];

    // Define the guarded attributes (not mass assignable)
    // protected $guarded = ['id']
}
