<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Movie;
use App\Http\Requests\MovieRequest;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all data, returned it to index.
        $data = Movie::all();
        return view('movie.movie-show', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Redirect to index.
        return redirect('movie');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\MovieRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieRequest $request)
    {
        // Cheking file availability.
        if ($request->hasFile('picture_url')) {
            // Checking file validness.
            if ($request->file('picture_url')->isValid()) {
                // Validate data.
                $validated = $request->validated();

                // Make file name.
                $extension = $validated['picture_url']->extension();
                $strname = strtolower(str_replace(' ', '', $validated['name']));
                $picture_name = $strname.'.'.$extension;

                // Store file.
                $request->picture_url->storeAs('public', $picture_name);

                // Generate file path, creating instance.
                $validated['picture_url'] = Storage::url($picture_name);
                $data = Movie::create($validated);

                return redirect('movie');
            }
        }
        // If something didn't go well :(
        abort(500, 'Can\'t upload image :(');
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
        return redirect('movie');
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
        $data = Movie::findOrFail($id);
        return view('movie.movie-edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\MovieRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MovieRequest $request, $id)
    {
        // Checking file availability.
        if ($request->hasFile('picture_url')) {
            // Checking file validness.
            if ($request->file('picture_url')->isValid()) {
                // Validate data.
                $validated = $request->validated();

                // Make file name.
                $extension = $validated['picture_url']->extension();
                $strname = strtolower(str_replace(' ', '', $validated['name']));
                $picture_name = $strname.'.'.$extension;

                // Store file.
                $request->picture_url->storeAs('public', $picture_name);

                // Generate file path, updating instance.
                $validated['picture_url'] = Storage::url($picture_name);
                $data = Movie::findOrFail($id)->update([
                    'name' => $validated['name'],
                    'minute_length' => $validated['minute_length'],
                    'picture_url' => $validated['picture_url'],
                ]);

                return redirect('movie');
            }
        }
        // If something didn't go well :(
        abort(500, 'Can\'t upload image :(');
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
        $data = Movie::findOrFail($id)->delete();
        return redirect('movie');
    }
}
