<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studio;
use App\Http\Requests\StudioRequest;

class StudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all data, returned it to index.
        $data = Studio::all();
        return view('studio.studio-show', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Redirect to index.
        return redirect('studio');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\StudioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudioRequest $request)
    {
        // Validate request, making an instance afterwards.
        $validated = $request->validated();
        $data = Studio::create($validated);

        // Redirect to index.
        return redirect('studio');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Return to index.
        return redirect('studio');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find data with $id, returned it to edit view.
        $data = Studio::findOrFail($id);
        return view('studio.studio-edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\StudioRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudioRequest $request, $id)
    {
        // Validate request, updataing afterwards.
        $validated = $request->validated();
        $data = Studio::findOrFail($id)->update([
            'name' => $validated['name'],
            'branch_id' => $validated['branch_id'],
            'basic_price' => $validated['basic_price'],
            'additional_friday_price' => $validated['additional_friday_price'],
            'additional_saturday_price' => $validated['additional_saturday_price'],
            'additional_sunday_price' => $validated['additional_sunday_price'],
        ]);

        // Redirect to index.
        return redirect('studio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find data with $id, deleting it immediately.
        $data = Studio::findOrFail($id)->delete();
        return redirect('studio');
    }
}
