<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Item extends Model
{
    use HasFactory;

    protected $table = 'order_item';

    protected $primaryKey = 'id';

    public $incrementing = true;

    // Specify if the primary key is not an integer
    // protected $keyType = 'string';

    // If you don't want Laravel to manage timestamps, set this to false
    // public $timestamps = false;

    // Define the fillable attributes (mass assignable)
    protected $fillable = [
                            'product_price', 
                            'order_fk_id', 
                            'product_fk_id', 
                            'quantity',
                        ];

    // Define the guarded attributes (not mass assignable)
    // protected $guarded = ['id']

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_fk_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_fk_id', 'id');
    }

}
