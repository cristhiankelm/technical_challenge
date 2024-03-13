<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateExpense;
use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ExpenseController extends Controller
{
    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = Expense::query()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('date', function ($data) {
                    return Carbon::parse($data->date)->format('d/m/Y');
                })
                ->editColumn('amount', function ($data) {
                    return $data->amount_formatted;
                })
                ->addColumn('action', function ($data) {
                    return "<a class='m-2' href='" . route('expense.edit', $data->id) . "'><i class='fas fa-pen fa-2x'></i></a>
                    <a class='m-2 linkDelete' href='#' data-href='" . route('expense.destroy', $data->id) . "' data-toggle='modal' data-target='#deleteModal'>
                        <i class='fas fa-trash fa-2x'></i>
                    </a>";
                })
                ->rawColumns(['action'])
                ->toJson();
        }
    }
    
    public function index()
    {
        return view('expense.index');
    }
    
    public function create()
    {
        return view('expense.create');
    }
    
    public function store(StoreUpdateExpense $request, Expense $expense)
    {
        $data = $request->validated();
        
        $expense->create($data);
        
        return to_route('expense.index');
    }
    
    public function edit(Expense $expense)
    {
        return view('expense.edit', compact('expense'));
    }
    
    public function update(StoreUpdateExpense $request, Expense $expense)
    {
        $data = $request->validated();
        
        $expense->update($data);
        
        return to_route('expense.index');
    }
    
    public function destroy(Expense $expense)
    {
        $expense->delete();
        
        return to_route('expense.index');
    }
}
