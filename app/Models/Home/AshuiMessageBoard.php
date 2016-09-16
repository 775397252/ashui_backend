<?php

namespace App\Models\Home;

use Eloquent as Model;
use App\Models\Background\Member;

/**
 * Class Tag
 * @package App\Models\Background
 */
class AshuiMessageBoard extends Model
{
    public $table = 'ashui_message_board';
    protected $guarded = ['id'];
    public function users()
    {
        return $this->hasOne(Member::class,'id','user_id');
    }
    public function to_users()
    {
        return $this->hasOne(Member::class,'id','to_user_id');
    }

}
