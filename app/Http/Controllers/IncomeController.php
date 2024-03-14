<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateIncome;
use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class IncomeController extends Controller
{
    /**
     * Proporciona los datos de los ingresos en formato JSON para ser utilizados en una tabla de datos (DataTable)
     * en el front-end. Incluye la posibilidad de formatear las columnas y agregar acciones de edición y eliminación.
     */
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
                    return "<a class='m-2' href='" . route('incomes.edit', $data->id) . "'><i class='fas fa-pen fa-2x'></i></a>
                    <a class='m-2 linkDelete' href='#' data-href='" . route('incomes.destroy', $data->id) . "' data-toggle='modal' data-target='#deleteModal'>
                        <i class='fas fa-trash fa-2x'></i>
                    </a>";
                })
                ->rawColumns(['action'])
                ->toJson();
        }
    }
    
    /**
     * Muestra la vista principal de la lista de ingresos.
     */
    public function index()
    {
        return view('incomes.index');
    }
    
    /**
     * Muestra la vista para crear un nuevo ingreso.
     */
    public function create()
    {
        return view('incomes.create');
    }
    
    /**
     * Valida y guarda un nuevo ingreso en la base de datos. Redirige a la lista de ingresos tras una creación exitosa.
     */
    public function store(StoreUpdateIncome $request, Income $income)
    {
        $data = $request->validated();
        
        $income->create($data);
        
        return to_route('incomes.index');
    }
    
    /**
     * Muestra la vista para editar un ingreso existente.
     */
    public function edit(Income $income)
    {
        return view('incomes.edit', compact('income'));
    }
    
    /**
     * Valida y actualiza un ingreso existente en la base de datos. Redirige a la lista de ingresos tras una actualización exitosa.
     */
    public function update(StoreUpdateIncome $request, Income $income)
    {
        $data = $request->validated();
        
        $income->update($data);
        
        return to_route('incomes.index');
    }
    
    /**
     * Elimina un ingreso existente de la base de datos. Redirige a la lista de ingresos tras una eliminación exitosa.
     */
    public function destroy(Income $income)
    {
        $income->delete();
        
        return to_route('incomes.index');
    }
}
