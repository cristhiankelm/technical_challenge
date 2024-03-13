<?php

namespace App\Http\Controllers;

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
                ->editColumn('date', function($data) {
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
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Expense $expense)
    {
        //
    }

    public function edit(Expense $expense)
    {
        //
    }

    public function update(Request $request, Expense $expense)
    {
        //
    }

    public function destroy(Expense $expense)
    {
        //
    }
}
