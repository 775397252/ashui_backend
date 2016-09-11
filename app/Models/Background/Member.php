<?php

namespace App\Models\Background;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Member
 * @package App\Models\Background
 */
class Member extends Model
{
    use SoftDeletes;

    public $table = 'members';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'phone',
        'email',
        'school',
        'password',
        'is_love',
        'username',
        'address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'phone' => 'string',
        'email' => 'string',
        'school' => 'string',
        'password' => 'string',
        'username' => 'string',
        'address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
