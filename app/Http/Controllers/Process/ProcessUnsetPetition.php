<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use App\Models\Process;
use Illuminate\Http\JsonResponse;

class ProcessUnsetPetition extends Controller
{
    /**
     * @param Processs $process
     * @param $files
     * @return JsonResponse
     */
    public function __invoke(Process $process, $files)
    {
        $fileIds = explode(',', $files);
        $fileIdsTotal = count($fileIds);

        if ($fileIdsTotal >= 1) {
            if ($fileIdsTotal === 1) {
                $file = $process->getMedia('petition')->find($fileIds)->first();

                $file->delete();

                return JsonResponse::create([
                    'file' => $file->toJson()
                ], 200);
            } else {
                $files = $process->getMedia('petition')->find($fileIds);

                foreach ($files as $file) {
                    $file->delete();
                }

                return JsonResponse::create([
                    'files' => $files->toArray()
                ], 200);
            }
        }

        return response()->json([
            'message' => 'File not found'
        ]);
    }
}
