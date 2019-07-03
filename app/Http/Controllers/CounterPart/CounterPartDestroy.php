<?php

namespace App\Http\Controllers\CounterPart;

use App\Http\Controllers\Controller;
use App\Http\Resources\CounterPart as CounterPartResource;
use App\Models\CounterPart;
use App\Utils\LogActivity\LogActivityUtil;
use Illuminate\Support\Facades\Auth;

class CounterPartDestroy extends Controller
{
    /**
     * @param CounterPart $counterPart
     * @return CounterPartResource
     */
    public function __invoke(CounterPart $counterPart)
    {
        $counterPart->delete();

        LogActivityUtil::register(Auth::user(), "Parte contrária $counterPart->name apagado(a)");

        return new CounterPartResource($counterPart);
    }
}
