<?php

namespace App\Models\Background;

use Eloquent as Model;
use App\Models\Home\AshuiBiaobaisComment;

/**
 * Class Biaobai
 * @package App\Models\Background
 */
class Biaobai extends Model
{
    public $table = 'biaobais';
    protected $guarded = ['id'];
    public function comments()
    {
        return $this->hasMany(AshuiBiaobaisComment::class,'biaobais_id','id');
    }
    public function users()
    {
        return $this->hasOne(Member::class,'id','user_id');
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
