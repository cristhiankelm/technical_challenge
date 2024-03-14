<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePermission;
use App\Models\Permission;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
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
    
    public function index()
    {
        return view('permissions.index');
    }
    
    public function create()
    {
        return view('permissions.create');
    }
    
    public function store(StoreUpdatePermission $request, Permission $permission)
    {
        $data = $request->validated();
        
        $permission->create($data);
        
        return to_route('permissions.index');
    }
    
    public function edit(Permission $permission)
    {
        return view('permissions.edit', compact('permission'));
    }
    
    public function update(StoreUpdatePermission $request, Permission $permission)
    {
        $data = $request->validated();
        
        $permission->update($data);
        
        return to_route('permissions.index');
    }
    
    public function destroy(Permission $permission)
    {
        $permission->delete();
        
        return to_route('permissions.index');
    }
}
