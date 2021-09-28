<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Inventory;
use App\Models\User;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('idRol', '=', 3)->get();
        $inventories = Inventory::where('idcategoria', '=', 2)->where('estado', '=', 1)->get();
        return view('backoffice.calendar.index', compact('users', 'inventories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        request()->validate(Calendar::$rules);

        foreach ($request->input('inventory_id') as $inventory_id) {
            $data = [
                'user_id' => $request->input('user_id'),
                'inventory_id' => $inventory_id,
                'start' => $request->input('start'),
                'end' => $request->input('end'),
                'startHour' => $request->input('startHour'),
                'endHour' => $request->input('endHour'),
            ];

            Calendar::create($data);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
      //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show()
    {
        $calendar = Calendar::all();
        $data = [];
        foreach ($calendar as $key => $item) {
            /* if (!empty($data) && $data[$key]['user_id'] === $item->user->id
                && $data[$key]['start'] === $item->start
                && $data[$key]['end'] === $item->end
                && $data[$key]['startHour'] === $item->startHour
                && $data[$key]['endHour'] === $item->endHour) { */
                $data[] = array_merge($item->toArray(), [
                    'title' => $item->user->name,
                    'start' => date('c', strtotime($item->start . $item->startHour)),
                    'end' => date('c', strtotime($item->end . $item->endHour)),
                ]);
            // }
        }

        return response()->json($data ?? []);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function display($id)
    {
        $calendar = Calendar::find($id);
        return response()->json($calendar);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calendar $calendar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calendar = Calendar::find($id)->delete();
        return response()->json($calendar);
    }
}
