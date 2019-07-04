<?php

namespace App\Http\Controllers\Assisted;

use App\Http\Controllers\Controller;
use App\Http\Resources\Assisted as AssistedResource;
use App\Models\Assisted;
use App\Utils\LogActivity\LogActivityUtil;
use Illuminate\Support\Facades\Auth;

class AssistedDestroy extends Controller
{
    /**
     * @param Assisted $assisted
     * @return AssistedResource
     */
    public function __invoke(Assisted $assisted)
    {
        $assisted->delete();

        LogActivityUtil::register(Auth::user(), "Assistido(a) $assisted->name apagado");

        return new AssistedResource($assisted);
    }
}
