<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateExpense;
use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ExpenseController extends Controller
{
    /**
     * Proporciona los datos de los gastos en formato JSON para ser utilizados en una tabla de datos (DataTable)
     * en el front-end. Incluye la posibilidad de formatear las columnas y agregar acciones de edición y eliminación.
     */
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
                    return "<a class='m-2' href='" . route('expenses.edit', $data->id) . "'><i class='fas fa-pen fa-2x'></i></a>
                    <a class='m-2 linkDelete' href='#' data-href='" . route('expenses.destroy', $data->id) . "' data-toggle='modal' data-target='#deleteModal'>
                        <i class='fas fa-trash fa-2x'></i>
                    </a>";
                })
                ->rawColumns(['action'])
                ->toJson();
        }
    }
    
    /**
     * Muestra la vista principal de la lista de gastos.
     */
    public function index()
    {
        return view('expenses.index');
    }
    
    /**
     * Muestra la vista para crear un nuevo gasto.
     */
    public function create()
    {
        return view('expenses.create');
    }
    
    /**
     * Valida y guarda un nuevo gasto en la base de datos. Redirige a la lista de gastos tras una creación exitosa.
     */
    public function store(StoreUpdateExpense $request, Expense $expense)
    {
        $data = $request->validated();
        
        $expense->create($data);
        
        return to_route('expenses.index');
    }
    
    /**
     * Muestra la vista para editar un gasto existente.
     */
    public function edit(Expense $expense)
    {
        return view('expenses.edit', compact('expense'));
    }
    
    /**
     * Valida y actualiza un gasto existente en la base de datos. Redirige a la lista de gastos tras una actualización exitosa.
     */
    public function update(StoreUpdateExpense $request, Expense $expense)
    {
        $data = $request->validated();
        
        $expense->update($data);
        
        return to_route('expenses.index');
    }
    
    /**
     * Elimina un gasto existente de la base de datos. Redirige a la lista de gastos tras una eliminación exitosa.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        
        return to_route('expenses.index');
    }
}
