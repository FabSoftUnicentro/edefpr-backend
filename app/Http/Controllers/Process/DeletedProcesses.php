<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use App\Models\Process;
use Illuminate\Http\Request;

class DeletedProcesses extends Controller
{
    private $itemsPerPage = 10;

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $perPage = $request->query->get('perPage', $this->itemsPerPage);

        $processes = Process::with([
            'user',
            'assisted',
            'counterPart'
        ])->onlyTrashed()->paginate($perPage);

        return view('processes.deleted.index', [
            'processes' => $processes
        ]);
    }
}
