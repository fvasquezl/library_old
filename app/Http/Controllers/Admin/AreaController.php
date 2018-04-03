<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::orderby('level','asc')->paginate();
        $parents = [];
        return view('admin.areas.index', compact('areas', 'parents'));

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

       return redirect()->route('areas.edit' ,$area);
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
    public function update(Request $request, Area $area)
    {
        $this->validate($request,[
            'name' => 'required|unique:areas|min:3',
            'code' => 'required|unique:areas',
            'level' => 'required|min:1',
            'parent_id' => 'required'
        ]);
        $area->update($request->all());

        $request->session()->flash('success','El area ha sido guradada correctamente');

        return redirect()->route('areas.edit' ,$area);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Area $area
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Area $area)
    {
        if($area->users()->count()){
            return redirect()->back()->with('errors', 'Existen usuarios en esta area, eliminelos o muevalos a otra area');
        }
        $area->delete();
        return redirect()->back()->with('success', 'El area '. $area->name.' ha sido eliminada');
    }
}
