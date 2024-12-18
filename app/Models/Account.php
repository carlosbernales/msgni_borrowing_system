<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $primaryKey = 'id';

    public $incrementing = true;

    // Specify if the primary key is not an integer
    // protected $keyType = 'string';

    // If you don't want Laravel to manage timestamps, set this to false
    // public $timestamps = false;

    // Define the fillable attributes (mass assignable)
    protected $fillable = [
                            'firstname', 
                            'lastname',
                            'password',
                            'email', 
                            'role', 
                            'phone_no', 
                            'username', 
                            'address', 
                            'other_info_address	', 
                        ];

    // Define the guarded attributes (not mass assignable)
    // protected $guarded = ['id']
}
