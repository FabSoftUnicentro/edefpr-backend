<?php

namespace App\Http\Controllers\Utils\Deploy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class Github extends Controller
{
    public function __invoke(Request $request)
    {
        $githubPayload = $request->getContent();
        $githubHash = $request->header('X-Hub-Signature');

        $localToken = config('app.deploy_secret');
        $localHash = 'sha1=' . hash_hmac('sha1', $githubPayload, $localToken, false);

        if (hash_equals($githubHash, $localHash)) {
            $root_path = base_path();
            $process = new Process('edef-app-deploy');
            $process->run();

            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            return response()->json([
                'message' => 'Deploy successful!'
            ]);
        }
    }
}
