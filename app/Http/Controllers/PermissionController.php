<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePermission;
use App\Models\Permission;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    /**
     * Proporciona los datos de los permisos en formato JSON para ser utilizados en una tabla de datos (DataTable)
     * en el front-end. Incluye la posibilidad de agregar acciones de edición y eliminación.
     */
    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = Permission::query()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return "<a class='m-2' href='" . route('permissions.edit', $data->id) . "'><i class='fas fa-pen fa-2x'></i></a>
                    <a class='m-2 linkDelete' href='#' data-href='" . route('permissions.destroy', $data->id) . "' data-toggle='modal' data-target='#deleteModal'>
                        <i class='fas fa-trash fa-2x'></i>
                    </a>";
                })
                ->rawColumns(['action'])
                ->toJson();
        }
    }
    
    /**
     * Muestra la vista principal de la lista de permisos.
     */
    public function index()
    {
        return view('permissions.index');
    }
    
    /**
     * Muestra la vista para crear un nuevo permiso.
     */
    public function create()
    {
        return view('permissions.create');
    }
    
    /**
     * Valida y guarda un nuevo permiso en la base de datos. Redirige a la lista de permisos tras una creación exitosa.
     */
    public function store(StoreUpdatePermission $request, Permission $permission)
    {
        $data = $request->validated();
        
        $permission->create($data);
        
        return to_route('permissions.index');
    }
    
    /**
     * Muestra la vista para editar un permiso existente.
     */
    public function edit(Permission $permission)
    {
        return view('permissions.edit', compact('permission'));
    }
    
    /**
     * Valida y actualiza un permiso existente en la base de datos. Redirige a la lista de permisos tras una actualización exitosa.
     */
    public function update(StoreUpdatePermission $request, Permission $permission)
    {
        $data = $request->validated();
        
        $permission->update($data);
        
        return to_route('permissions.index');
    }
    
    /**
     * Elimina un permiso existente de la base de datos. Redirige a la lista de permisos tras una eliminación exitosa.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        
        return to_route('permissions.index');
    }
}
