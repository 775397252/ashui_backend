<?php

namespace App\Repositories\Background;

use App\Models\Background\Member;
use InfyOm\Generator\Common\BaseRepository;

class MemberRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Member::class;
    }
}
