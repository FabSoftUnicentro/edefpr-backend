<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use App\Models\Process;
use App\Utils\LogActivity\LogActivityUtil;
use Illuminate\Http\Request;

class ProcessUpdate extends Controller
{
    /**
     * @param Request $request
     * @param Process $process
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, Process $process)
    {
        $process->update($request->all());
        $wage = Process::BRAZIL_MINIMUM_WAGE * 3;
        $sfup = 1500;

        try {
            if ($process->assisted->getAssetsPrice() > Process::STANDARD_FISCAL_UNIT_OF_PARANA * $sfup) {
                throw new \Exception("A soma dos bens do assistido excede $sfup UFP/PR");
            } elseif ($process->assisted->getNetFamilyIncome() > $wage) {
                $wage = money($wage);
                throw new \Exception("A soma da renda familiar do assistido excede R$ $wage");
            }
            $process->save();

            LogActivityUtil::register($request->user(), "Dados do processo $process->title atualizados");

            return redirect()
                ->route('processes.index')
                ->with('alert-success', 'Processo atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput($request->all())
                ->with('alert-danger', 'Falha na atualização do processo! ' . $e->getMessage());
        }
    }
}
