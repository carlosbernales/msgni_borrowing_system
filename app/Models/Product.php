<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'id';

    public $incrementing = true;

    // Specify if the primary key is not an integer
    // protected $keyType = 'string';

    // If you don't want Laravel to manage timestamps, set this to false
    // public $timestamps = false;

    // Define the fillable attributes (mass assignable)
    protected $fillable = [
                            'cat_fk_id', 
                            'cat_name', 
                            'product_name', 
                            'product_name', 
                            'product_desc', 
                            'product_price', 
                            'product_image', 
                        ];

    // Define the guarded attributes (not mass assignable)
    // protected $guarded = ['id']
}
