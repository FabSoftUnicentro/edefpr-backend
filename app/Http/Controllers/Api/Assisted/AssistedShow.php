<?php

namespace App\Http\Controllers\Api\Assisted;

use App\Http\Controllers\Controller;
use App\Http\Resources\Assisted as AssistedResource;
use App\Models\Assisted;

class AssistedShow extends Controller
{
    /**
     * @param Assisted $assisted
     * @return AssistedResource
     */
    public function __invoke(Assisted $assisted)
    {
        return new AssistedResource($assisted);
    }
}
