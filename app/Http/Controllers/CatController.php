<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
       $this->middleware('auth')->except(['index', 'show']);
    }
    public function index()
    {
        $cats = Cat::latest()->paginate(5);

        return view('cats.index',compact('cats'))
            ->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cats.create');  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
        ]);

        Cat::create($request->all());

        return redirect()->route('cats.index')
                        ->with('success','Cat created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cat $cat)
    {
        return view('cats.show',compact('cat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cat $cat)
    {
        return view('cats.edit',compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cat $cat)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
        ]);

        $cat->update($request->all());

        return redirect()->route('cats.index')
                        ->with('success','Cat updated successfully');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cat $cat)
    {
        $cat->delete();

        return redirect()->route('cats.index')
                        ->with('success','Cat deleted successfully');    }
}
