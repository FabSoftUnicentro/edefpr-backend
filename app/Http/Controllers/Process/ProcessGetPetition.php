<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use App\Models\Process;
use App\Utils\LogActivity\LogActivityUtil;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaStream;

class ProcessGetPetition extends Controller
{
    /**
     * @param Process $process
     * @param $files
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Process $process, $files)
    {
        $fileIds = explode(',', $files);

        return $this->buildResponse($fileIds, $process);
    }


    /**
     * @param array $fileIds
     * @param $process
     * @return \Illuminate\Http\JsonResponse|MediaStream|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    private function buildResponse(array $fileIds, $process)
    {
        $fileIdsTotal = count($fileIds);

        if ($fileIdsTotal >= 1) {
            if ($fileIdsTotal === 1) {
                $file = $process->getMedia('petition')->find($fileIds)->first();

                LogActivityUtil::register(Auth::user(), "Fez o download de uma petição do processo $process->title");

                return response()->download($file->getPath(), $file->file_name);
            } else {
                $files = $process->getMedia('petition')->find($fileIds);
                $zipFilename = $this->buildFilename($process);

                LogActivityUtil::register(Auth::user(), "Fez o download de petições do processo $process->title");

                return MediaStream::create($zipFilename)->addMedia($files);
            }
        }

        return response()->json([
            'message' => 'File not found'
        ]);
    }

    /**
     * @param $process
     * @return mixed
     */
    private function buildFilename($process)
    {
        $extension = "zip";
        $suffix = gettimeofday()["usec"];
        $prefix = $process->title;

        $filename = "${prefix}-files-${suffix}.${extension}";
        $zipFilename = str_replace(" ", "-", $filename);

        return $zipFilename;
    }
}
