<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateTable;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    private $repository;

    public function __construct(Table $table)
    {
        $this->repository = $table;

        $this->middleware(['can:tables']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = $this->repository->latest()->paginate();

        return view('admin.pages.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateTable
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateTable $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('tables.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$tables = $this->repository->find($id)){
            return redirect()->back();
        }

        return view('admin.pages.tables.show', compact('tables'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$tables = $this->repository->find($id)){
            return redirect()->back();
        }

        return view('admin.pages.tables.edit', compact('tables'));
    }

    /**
     * Update register by id.
     *
     * @param  \App\Http\Requests\StoreUpdateTable
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateTable $request, $id)
    {
        if(!$tables = $this->repository->find($id)){
            return redirect()->back();
        }

        $tables->update($request->all());

        return redirect()->route('tables.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$tables = $this->repository->find($id)){
            return redirect()->back();
        }

        $tables->delete();

        return redirect()->route('tables.index');
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

        $tables = $this->repository
                            ->where(function ($query) use ($request) {
                                if($request->filter){
                                    $query->orWhere('description', 'LIKE', '%{$request->filter}%');
                                    $query->orWhere('identify', $request->filter);
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.tables.index', compact('tables', 'filters' ));
    }

}
