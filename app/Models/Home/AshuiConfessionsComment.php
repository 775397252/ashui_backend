<?php

namespace App\Models\Home;

use Eloquent as Model;
use App\Models\Background\Member;

/**
 * Class Tag
 * @package App\Models\Background
 */
class AshuiConfessionsComment extends Model
{
    public $table = 'ashui_confessions_comment';
    protected $guarded = ['id'];
    public function users()
    {
        return $this->hasOne(Member::class,'id','user_id');
    }

}
