<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OptionFormRequest;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{

    public function index()
    {
        return view('admin.options.index',[
            'options' => Option::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $option = new Option();

        return view('admin.options.form',[
            'option'=> $option
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionFormRequest $request)
    {
        Option::create($request->validated());

        return to_route('admin.option.index')->with('sucess','L\'option bien été créé');

    }


    public function edit(string  $id)
    {
        $option = Option::find($id);


        return view('admin.options.form',[
            'option'=> $option
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OptionFormRequest $request,Option $option)
    {
        $option->update($request->validated());
        return to_route('admin.option.index')->with('sucess','L\'option a bien été modifié');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string  $id)
    {
        $option = Option::find($id);

        $option->delete();
        return to_route('admin.option.index')->with('sucess','L\'option a bien été supprimé');

    }
}
