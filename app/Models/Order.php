<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $primaryKey = 'id';

    public $incrementing = true;

    // Specify if the primary key is not an integer
    // protected $keyType = 'string';

    // If you don't want Laravel to manage timestamps, set this to false
    // public $timestamps = false;

    // Define the fillable attributes (mass assignable)
    protected $fillable = [
                            'order_id', 
                            'user_fk_id', 
                            'order_status', 
                            'order_total',
                            'fullname',
                            'email',
                            'phone_no',
                            'others',
                        ];

    // Define the guarded attributes (not mass assignable)
    // protected $guarded = ['id']
}
