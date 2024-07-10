<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $table = 'borrow';

    protected $primaryKey = 'id';

    public $incrementing = true;

    // Specify if the primary key is not an integer
    // protected $keyType = 'string';

    // If you don't want Laravel to manage timestamps, set this to false
    // public $timestamps = false;

    // Define the fillable attributes (mass assignable)
    protected $fillable = [
                            'user_fk_id', 
                            'product_fk_id', 
                            'fullname', 
                            'email',
                            'contact',
                            'speed_test',
                            'borrow_status',
                            'borrow_id',
                            'deadline'
                        ];

    // Define the guarded attributes (not mass assignable)
    // protected $guarded = ['id']

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_fk_id', 'id');
    }
}
