<?php

namespace App\Http\Controllers\CounterPart;

use App\Http\Controllers\Controller;
use App\Http\Resources\CounterPart as CounterPartResource;
use App\Models\CounterPart;
use App\Utils\Document;
use Illuminate\Http\Request;

class CounterPartStore extends Controller
{
    /**
     * @param Request $request
     * @return CounterPartResource
     * @throws \Throwable
     */
    public function __invoke(Request $request)
    {
        if ($request['document_type'] === (Document::TYPE_CPF)) {
            if (!Document::isCpf($request['document_number'])) {
                return redirect()
                    ->back()
                    ->with('alert-danger', 'Falha ao cadastrar, CPF incorreto!');
            }
        } elseif ($request['document_type'] === (Document::TYPE_CNPJ)) {
            if (!Document::isCnpj($request['document_number'])) {
                return redirect()
                    ->back()
                    ->with('alert-danger', 'Falha ao cadastrar, CNPJ incorreto!');
            }
        } else {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha ao cadastrar, verifique o tipo do documento indentificador!');
        }

        $params = $request->all();

        $remuneration = $params['remuneration'];
        $remuneration = str_replace('.', '', $remuneration);
        $remuneration = str_replace(',', '.', $remuneration);

        $params['remuneration'] = floatval($remuneration);

        $counterPart = new CounterPart($params);

        try {
            $counterPart->save();

            return redirect()
                ->route('counterParts.index')
                ->with('alert-success', 'Atendimento cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha ao cadastrar novo atendimento!');
        }
    }
}
