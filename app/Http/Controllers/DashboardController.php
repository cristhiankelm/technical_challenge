<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Calcula y muestra en el panel de control los totales de ingresos y gastos del mes actual y del año en curso.
     */
    public function index()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $startOfYear = Carbon::now()->startOfYear();
        $endOfYear = Carbon::now()->endOfYear();
        
        $incomeLastMonth = Income::query()->whereBetween('date', [$startOfMonth, $endOfMonth])->sum('amount');
        $expenseLastMonth = Expense::query()->whereBetween('date', [$startOfMonth, $endOfMonth])->sum('amount');
        
        $incomeYear = Income::query()->whereBetween('date', [$startOfYear, $endOfYear])->sum('amount');
        $expenseYear = Expense::query()->whereBetween('date', [$startOfYear, $endOfYear])->sum('amount');
        
        return view('dashboard', compact(['incomeLastMonth', 'expenseLastMonth', 'incomeYear', 'expenseYear']));
    }
}
