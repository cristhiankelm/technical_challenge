<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Proporciona los datos de los usuarios en formato JSON para ser utilizados en una tabla de datos (DataTable)
     * en el front-end, excluyendo al usuario autenticado actual. Incluye una columna de acciones con iconos para
     * editar y eliminar, aunque las rutas de estas acciones no están definidas en este fragmento de código.
     */
    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = User::query()->where('id', '!=', auth()->id())->get();
            return DataTables::of($data)
                ->addIndexColumn()
//                ->addColumn('action', function ($data) {
//                    return "<a class='m-2' href='" . route('incomes.edit', $data->id) . "'><i class='fas fa-pen fa-2x'></i></a>
//                    <a class='m-2 linkDelete' href='#' data-href='" . route('incomes.destroy', $data->id) . "' data-toggle='modal' data-target='#deleteModal'>
//                        <i class='fas fa-trash fa-2x'></i>
//                    </a>";
//                })
                ->addColumn('action', function () {
                    return "<a class='mx-2'><i class='fas fa-pen fa-2x'></i></a>
                            <a class='mx-2'><i class='fas fa-trash fa-2x'></i></a>";
                })
                ->rawColumns(['action'])
                ->toJson();
        }
    }
    
    /**
     * Muestra la vista principal de la lista de usuarios.
     */
    public function index()
    {
        return view('users.index');
    }
}
