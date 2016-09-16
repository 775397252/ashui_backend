<?php

namespace App\Models\Background;

use Eloquent as Model;
use App\Models\Background\Member;
use App\Models\Home\AshuiPlaceComment;

/**
 * Class Tag
 * @package App\Models\Background
 */
class AshuiPlace extends Model
{
    public $table = 'ashui_place';
    protected $guarded = ['id'];
    public function comments()
    {
        return $this->hasMany(AshuiPlaceComment::class,'place_id','id');
    }
    public function users()
    {
        return $this->hasOne(Member::class,'id','user_id');
    }
}
