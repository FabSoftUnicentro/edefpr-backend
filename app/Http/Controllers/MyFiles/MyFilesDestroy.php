<?php

namespace App\Http\Controllers\MyFiles;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaStream;

class MyFilesDestroy extends Controller
{
    /**
     * @param Request $request
     * @param $files
     * @return JsonResponse|MediaStream
     */
    public function __invoke(Request $request, $files)
    {
        $fileIds = explode(',', $files);
        $fileIdsTotal = count($fileIds);

        if ($fileIdsTotal >= 1) {
            if ($fileIdsTotal === 1) {
                $file = $request->user()->getMedia('myfiles')->find($fileIds)->first();

                $file->delete();

                return JsonResponse::create([
                    'file' => $file->toJson()
                ], 200);
            } else {
                $files = $request->user()->getMedia('myfiles')->find($fileIds);

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
