<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = User::query()->where('id', '!=', auth()->id())->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return "<a class='m-2' href='" . route('incomes.edit', $data->id) . "'><i class='fas fa-pen fa-2x'></i></a>
                    <a class='m-2 linkDelete' href='#' data-href='" . route('incomes.destroy', $data->id) . "' data-toggle='modal' data-target='#deleteModal'>
                        <i class='fas fa-trash fa-2x'></i>
                    </a>";
                })
                ->rawColumns(['action'])
                ->toJson();
        }
    }
    
    public function index()
    {
        return view('users.index');
    }
}
