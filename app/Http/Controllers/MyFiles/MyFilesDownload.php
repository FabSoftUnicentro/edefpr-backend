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

        return $this->buildResponse($fileIds, $request->user());
    }


    /**
     * @param array $fileIds
     * @param $user
     * @return \Illuminate\Http\RedirectResponse
     */
    private function buildResponse(array $fileIds, $user)
    {
        $fileIdsTotal = count($fileIds);

        if ($fileIdsTotal >= 1) {
            if ($fileIdsTotal === 1) {
                $file = $user->getMedia('myfiles')->find($fileIds)->first();

                return response()->download($file->getPath(), $file->file_name);
            } else {
                $files = $user->getMedia('myfiles')->find($fileIds);
                $zipFilename = $this->buildFilename($user);

                return MediaStream::create($zipFilename)->addMedia($files);
            }
        }

        return response()->json([
            'message' => 'File not found'
        ]);
    }

    /**
     * @param $user
     * @return string
     */
    private function buildFilename($user)
    {
        $extension = "zip";
        $suffix = gettimeofday()["usec"];
        $prefix = $user->name;

        $filename = "${prefix}-files-${suffix}.${extension}";
        $zipFilename = str_replace(" ", "-", $filename);

        return $zipFilename;
    }
}
