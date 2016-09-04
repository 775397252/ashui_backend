<?php

namespace App\Models\Background;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Biaobai
 * @package App\Models\Background
 */
class Biaobai extends Model
{
    use SoftDeletes;

    public $table = 'biaobais';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'content',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'content' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
