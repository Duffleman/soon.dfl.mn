<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\NewTimerRequest;
use App\Timer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TimerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $timers = auth()->user()->timers()->orderBy('date')->get();

        return view('timers.index', compact('timers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(NewTimerRequest $request)
    {
        $time = Carbon::parse($request->time);
        $title = $request->title;

        Timer::create([
            'name'    => $title,
            'date'    => $time,
            'user_id' => auth()->user()->id,
        ]);

        flash()->success('Timer added.');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int     $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Timer $timer)
    {
        $timer->delete();
        flash()->success('Timer deleted.');
        return redirect('/');
    }
}
