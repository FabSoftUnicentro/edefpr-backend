<?php

namespace App\Http\Controllers\MyFiles;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Forms\MyFiles\MyFilesForm;
use Spatie\MediaLibrary\Models\Media;

class MyFilesIndex extends Controller
{
    private $itemsPerPage = 10;

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $perPage = $request->query->get('perPage', $this->itemsPerPage);

        $files = $request->user()->media()->where('collection_name', 'myfiles')->paginate($perPage);

        $form = $this->formBuilder->create(MyFilesForm::class, [
            'url' => route('myFiles.store'),
            'method' => 'POST'
        ]);

        return view('myFiles.index', [
            'form' => $form,
            'files' => $files
        ]);
    }
}
