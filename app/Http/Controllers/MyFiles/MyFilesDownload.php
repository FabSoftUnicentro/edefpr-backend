<?php

namespace App\Http\Controllers\MyFiles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaStream;

class MyFilesDownload extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, $files)
    {
        $fileIds = explode(',', $files);
        $fileIdsTotal = count($fileIds);

        if ($fileIdsTotal >= 1) {
            if ($fileIdsTotal === 1) {
                $file = $request->user()->getMedia('myfiles')->find($fileIds)->first();

                return response()->download($file->getPath(), $file->file_name);
            } else {
                $files = $request->user()->getMedia('myfiles')->find($fileIds);

                return MediaStream::create('meus-arquivos.zip')->addMedia($files);
            }
        }

        return response()->json([
            'message' => 'File not found'
        ]);
    }
}
