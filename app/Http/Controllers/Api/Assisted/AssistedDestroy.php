<?php

namespace App\Http\Controllers\Api\Assisted;

use App\Http\Controllers\Controller;
use App\Http\Resources\Assisted as AssistedResource;
use App\Models\Assisted;

class AssistedDestroy extends Controller
{
    /**
     * @param Assisted $assisted
     * @return AssistedResource
     * @throws \Exception
     */
    public function __invoke(Assisted $assisted)
    {
        $assisted->delete();

        return new AssistedResource($assisted);
    }
}
