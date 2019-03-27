<?php
/**
 * Created by PhpStorm.
 * User: SUdoW
 * Date: 20/02/2019
 * Time: 20:45
 */

namespace App\Http\Controllers\CounterPart;

use App\Http\Controllers\Controller;
use App\Models\CounterPart;
use App\Utils\Document;
use Illuminate\Http\Request;

class CounterPartUpdate extends Controller
{
    /**
     * @param Request $request
     * @param CounterPart $counterPart
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, CounterPart $counterPart)
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

        $counterPart->update($params);

        try {
            $counterPart->save();

            return redirect()
                ->route('counterParts.index')
                ->with('alert-success', 'Parte contraria atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha na atualização da parte contraria!');
        }
    }
}
