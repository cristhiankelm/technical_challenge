<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateIncome;
use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class IncomeController extends Controller
{
    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = Income::query()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('date', function($data) {
                    return Carbon::parse($data->date)->format('d/m/Y');
                })
                ->editColumn('amount', function ($data) {
                    return $data->amount_formatted;
                })
                ->addColumn('action', function ($data) {
                    return "<a class='m-2' href='" . route('income.edit', $data->id) . "'><i class='fas fa-pen fa-2x'></i></a>
                    <a class='m-2 linkDelete' href='#' data-href='" . route('income.destroy', $data->id) . "' data-toggle='modal' data-target='#deleteModal'>
                        <i class='fas fa-trash fa-2x'></i>
                    </a>";
                })
                ->rawColumns(['action'])
                ->toJson();
        }
    }
    
    public function index()
    {
        return view('income.index');
    }
    
    public function create()
    {
        return view('income.create');
    }
    
    public function store(StoreUpdateIncome $request, Income $income)
    {
        $data = $request->validated();
        
        $income->create($data);
        
        return to_route('income.index');
    }
    
    public function edit(Income $income)
    {
        return view('income.edit', compact('income'));
    }
    
    public function update(StoreUpdateIncome $request, Income $income)
    {
        $data = $request->validated();
        
        $income->update($data);
        
        return to_route('income.index');
    }
    
    public function destroy(Income $income)
    {
        $income->delete();
        
        return to_route('income.index');
    }
}
