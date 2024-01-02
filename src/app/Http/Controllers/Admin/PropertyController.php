<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{

    public function index()
    {
        return view('admin.properties.index',[
            'properties' => Property::orderBy('created_at','desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $property = new Property();
        $property->fill([

            'surface'=>40,
            'rooms'=>3,
            'bedrooms'=>1,
            'floor'=>0 ,
            'city'=>"sfax" ,
            'postal_code'=>3080,
            'sold'=>false,
        ]);
        return view('admin.properties.form',[
            'property'=> $property
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        Property::create($request->validated());

        return to_route('admin.property.index')->with('sucess','Le bien a bien été créé');

    }


    public function edit(string  $id)
    {
        $property = Property::find($id);


        return view('admin.properties.form',[
            'property'=> $property
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request,Property $property)
    {
        $property->update($request->validated());
        return to_route('admin.property.index')->with('sucess','Le bien a bien été modifié');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string  $id)
    {
        $property = Property::find($id);

        $property->delete();
        return to_route('admin.property.index')->with('sucess','Le bien a bien été supprimé');

    }
}
