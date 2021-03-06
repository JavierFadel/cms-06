<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Http\Requests\BranchRequest;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all data, returned it to index.
        $data = Branch::all();
        return view('branch.branch-show', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Redirect to index.
        return redirect('branch');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\BranchRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BranchRequest $request)
    {
        // Validate request, making it an instance.
        $validated = $request->validated();
        $data = Branch::create($validated);

        // Redirect.
        return redirect('branch');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Redirect to index.
        return redirect('branch');
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
        $data = Branch::findOrFail($id);
        return view('branch.branch-edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\BranchRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BranchRequest $request, $id)
    {
        // Validate request, updating instance afterwards.
        $validated = $request->validated();
        $data = Branch::findOrFail($id)->update([
            'name' => $validated['name']
        ]);

        // Redirect to index.
        return redirect('branch');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find data with $id, delete it immediately.
        $data = Branch::findOrFail($id)->delete();
        return redirect('branch');
    }
}
