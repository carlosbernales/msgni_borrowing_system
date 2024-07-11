<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    protected $primaryKey = 'id';

    public $incrementing = true;

    // Specify if the primary key is not an integer
    // protected $keyType = 'string';

    // If you don't want Laravel to manage timestamps, set this to false
    // public $timestamps = false;

    // Define the fillable attributes (mass assignable)
    protected $fillable = [
                            'user_fk_id', 
                            'fk_product_id', 
                            'cart_qty', 
                            'status'
                        ];

    // Define the guarded attributes (not mass assignable)
    // protected $guarded = ['id']
}
