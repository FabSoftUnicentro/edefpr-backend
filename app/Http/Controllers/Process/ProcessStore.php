<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use App\Models\Process;
use App\Utils\LogActivity\LogActivityUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProcessStore extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        $process = new Process($request->all());
        $process->user()->associate(Auth::user());
        $wage = Process::BRAZIL_MINIMUM_WAGE * 3;
        $standardFiscalUnitOfParana = 1500;
        $amountFamilyMinimumWage = Process::FAMILY_MINIMUM_WAGE_AMOUNT;

        try {
            if ($process->assisted->getAssetsPrice() > Process::STANDARD_FISCAL_UNIT_OF_PARANA * $standardFiscalUnitOfParana) {
                throw new \Exception("A soma dos bens do assistido excede $standardFiscalUnitOfParana UFP/PR");
            } elseif ($process->assisted->getNetFamilyIncome() > $wage) {
                $wage = money($wage);
                throw new \Exception("A soma da renda familiar do assistido excede R$ $wage");
            } elseif ($process->assisted->getFinancialInvestmentsTotal() > $amountFamilyMinimumWage * Process::BRAZIL_MINIMUM_WAGE) {
                throw new \Exception("A soma das aplicações do assistido excede $amountFamilyMinimumWage SMF");
            }
            $process->save();
            LogActivityUtil::register($request->user(), "Processo $process->title aberto");

            return redirect()
                ->route('processes.index')
                ->with('alert-success', 'Processo cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput($request->all())
                ->with('alert-danger', 'Falha no cadastro do processo! ' . $e->getMessage());
        }
    }
}
