<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAreasRequest;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::orderby('level','asc')->get();
        return view('admin.areas.index', compact('areas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.areas.create');
    }

    public function getLevelParents(Request $request, $id)
    {
        if($request->ajax()){
            $levelParents = Area::getLevelParents($id);
            return response()->json($levelParents);
        }
        return Area::getLevelParents($id);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:areas|min:3',
        ]);
       $area = Area::create($request->all());

       return redirect()->route('admin.areas.edit' ,$area);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        $parents= Area::getLevelParents($area->level);
        return view('admin.areas.edit', compact('area', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAreasRequest $request, Area $area)
    {

        $area->update($request->validated());

        $request->session()->flash('success','El area ha sido guardada correctamente');

        return redirect()->route('admin.areas.index');
    }


    /**
     * @param Area $area
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Area $area, Request $request)
    {
        if($area->children->count()){
            return redirect()->back()
                ->with('info', 'Existen areas que reportan de esta, eliminelas o muevalas a otra area');
        }
        if($area->users()->count()){
            return redirect()->back()
                ->with('info', 'Existen usuarios en esta area, eliminelos o muevalos a otra area');
        }

        $area->delete();
        return redirect()->back()->with('success', 'El area '. $area->name.' ha sido eliminada');
    }
}
