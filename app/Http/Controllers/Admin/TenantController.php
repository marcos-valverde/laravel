<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateTenant;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TenantController extends Controller
{
    private $repository;

    public function __construct(Tenant $tenants)
    {
        $this->repository = $tenants;

        $this->middleware(['can:tenants']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = $this->repository->latest()->paginate();

        return view('admin.pages.tenants.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateTenant
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateTenant $request)
    {
        $data = $request->all();
        $tenant = auth()->user()->tenant;

        if($request->hasFile('logo') && $request->logo->isValid())
        {
            $data['logo'] = $request->logo->store("tenants/{$tenant->uuid}/tenants");
        }

        $this->repository->create($data);

        return redirect()->route('tenants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$tenants = $this->repository->find($id)){
            return redirect()->back();
        }

        return view('admin.pages.tenants.show', compact('tenants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$tenants = $this->repository->find($id)){
            return redirect()->back();
        }

        return view('admin.pages.tenants.edit', compact('tenants'));
    }

    /**
     * Update register by id.
     *
     * @param  \App\Http\Requests\StoreUpdateTenant
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateTenant $request, $id)
    {
        if(!$tenants = $this->repository->find($id)){
            return redirect()->back();
        }

        $data = $request->all();
        $tenant = auth()->user()->tenant;
        
        if($request->hasFile('logo') && $request->logo->isValid())
        {
            if(Storage::exists($tenants->logo))
            {
                Storage::delete($tenants->logo);
            }

            $data['logo'] = $request->logo->store("tenants/{$tenant->uuid}/tenants");
        }

        $tenants->update($data);

        return redirect()->route('tenants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$tenants = $this->repository->find($id)){
            return redirect()->back();
        }

        if(Storage::exists($tenants->logo))
        {
            Storage::delete($tenants->logo);
        }
        
        $tenants->delete();

        return redirect()->route('tenants.index');
    }

    /**
     * Search results
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $filters  = $request->only('filter');

        $tenants = $this->repository
                            ->where(function ($query) use ($request) {
                                if($request->filter){
                                    $query->where('name', 'like', '%{$request->filter}%');
                                }
                            })
                            ->latest()
                            ->paginate();
    
        return view('admin.pages.tenants.index', compact('tenants', 'filters' ));
    }

}
