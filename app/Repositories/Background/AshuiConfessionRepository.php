<?php

namespace App\Repositories\Background;

use App\Models\Background\AshuiConfession;
use InfyOm\Generator\Common\BaseRepository;

class AshuiConfessionRepository extends BaseRepository
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
        return AshuiConfession::class;
    }
}
