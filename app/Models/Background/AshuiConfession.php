<?php

namespace App\Models\Background;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Home\AshuiConfessionsComment;
/**
 * Class AshuiConfession
 * @package App\Models\Background
 */
class AshuiConfession extends Model
{
    use SoftDeletes;

    public $table = 'ashui_confessions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'type',
        'typr_name',
        'title',
        'content'
    ];
    //关联表confessions_id外键，id本地逐渐
    public function comments()
    {
        return $this->hasMany(AshuiConfessionsComment::class,'confessions_id','id');
    }


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'typr_name' => 'string',
        'title' => 'string',
        'content' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
