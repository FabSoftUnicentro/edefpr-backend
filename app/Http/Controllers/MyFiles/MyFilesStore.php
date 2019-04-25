<?php

namespace App\Http\Controllers\MyFiles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyFilesStore extends Controller
{
    private $path = 'files/myfiles/';

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        $path = storage_path($this->path);
        $user = Auth::user();

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $files = $request->file('files');

        foreach ($files as $file) {
            $name = str_replace(" ", "_", $file->getClientOriginalName());
            $file->move($path, $name);

            $user
                ->addMedia(storage_path($this->path . $name))
                ->toMediaCollection('myfiles');
        }

        try {
            return redirect()
                ->route('myFiles.index')
                ->with('alert-success', 'Arquivo salvo com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha ao salvar arquivo!');
        }
    }
}
