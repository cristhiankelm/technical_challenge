<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = Income::query()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    
    public function index()
    {
        return view('income.index');
    }
    
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(Income $income)
    {
        //
    }
    
    public function edit(Income $income)
    {
        //
    }
    
    public function update(Request $request, Income $income)
    {
        //
    }
    
    public function destroy(Income $income)
    {
        //
    }
}
