<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Movie;
use App\Models\Studio;
use App\Http\Requests\Schedule;
use App\Http\Requests\ScheduleRequest;
use App\Models\Schedule as ModelsSchedule;
use Carbon\Carbon;
use DateTime;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('schedules')
                        ->orderBy('start', 'asc')
                        ->get();

        return view('schedule.schedule-show', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('schedule');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\ScheduleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleRequest $request)
    {
        // Validate data.
        $validated = $request->validated();

        // Calculate end time.
        $movielength = Movie::findOrFail($validated['movie_id'])->minute_length;
        $start = strtotime($validated['start']) / 60;
        $endtime = Carbon::parse($validated['start'])->addMinutes($movielength)->toDateTimeString();

        // Calculate total price.
        $basic_price = Studio::findOrFail($validated['studio_id'])->basic_price;
        $additional_friday = Studio::findOrFail($validated['studio_id'])->additional_friday_price;
        $additional_saturday = Studio::findOrFail($validated['studio_id'])->additional_saturday_price;
        $additional_sunday = Studio::findOrFail($validated['studio_id'])->additional_sunday_price;

        switch (date('l', strtotime($validated['start']))) {
            case 'Friday':
                $total_price = $basic_price + $additional_friday;
                break;

            case 'Saturday':
                $total_price = $basic_price + $additional_saturday;
                break;

            case 'Sunday':
                $total_price = $basic_price + $additional_sunday;
                break;

            default:
                $total_price = $basic_price;
                break;
        }

        // Assign value, create instance.
        $validated['end'] = $endtime;
        $validated['price'] = $total_price;
        $data = ModelsSchedule::create($validated);

        // Redirect.
        return redirect('schedule');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('schedule');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ModelsSchedule::findOrFail($id);
        return view('schedule.schedule-edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requesta\ScheduleRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleRequest $request, $id)
    {
        // Validate data.
        $validated = $request->validated();

        // Calculate end time.
        $minute_length = Movie::findOrFail($validated['movie_id'])->minute_length;
        // $start = strtotime($validated['start']) / 60;
        $endtime = Carbon::parse($validated['start'])->addMinutes($minute_length)->toDateTimeString();

        // Calculate total price.
        $basic_price = Studio::findOrFail($validated['studio_id'])->basic_price;
        $additional_friday = Studio::findOrFail($validated['studio_id'])->additional_friday_price;
        $additional_saturday = Studio::findOrFail($validated['studio_id'])->additional_saturday_price;
        $additional_sunday = Studio::findOrFail($validated['studio_id'])->additional_sunday_price;

        switch (date('l', strtotime($validated['start']))) {
            case 'Friday':
                $total_price = $basic_price + $additional_friday;
                break;

            case 'Saturday':
                $total_price = $basic_price + $additional_saturday;
                break;

            case 'Sunday':
                $total_price = $basic_price + $additional_sunday;
                break;

            default:
                $total_price = $basic_price;
                break;
        }

        // Assign value, updating instance.
        $data = ModelsSchedule::findOrFail($id)->update([
            'movie_id' => $validated['movie_id'],
            'studio_id' => $validated['studio_id'],
            'start' => $validated['start'],
            'end' => $endtime,
            'price' => $total_price,
        ]);

        // Redirect.
        return redirect('schedule');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ModelsSchedule::findOrFail($id)->delete();
        return redirect('schedule');
    }
}
