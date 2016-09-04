<?php

namespace App\Repositories\Background;

use App\Models\Background\Biaobai;
use InfyOm\Generator\Common\BaseRepository;

class BiaobaiRepository extends BaseRepository
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
        return Biaobai::class;
    }
}
