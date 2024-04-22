<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Course;
use App\Models\export;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\DriversTimetable;
use App\Notifications\ScheduleNotification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;

class ScheduleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:import-create', ['only' => ['create', 'store']]);
    }

    public function index($driverId)
    {
        $driver = DriversTimetable::findOrFail($driverId);

        return view('schedules.index', compact('driver'));
    }

    public function create($driverId)
    {
        $driver = DriversTimetable::findOrFail($driverId);
        $imports = Course::pluck('id', 'id');
        $exports = export::pluck('id', 'id');
        $imports->prepend("None", null);
        $exports->prepend("None", null);
        return view('schedules.create', compact('driver', 'imports', 'exports'));
    }

    public function store(Request $request)
    {
        $driverId = $request->input('driverid');
        $driver = DriversTimetable::findOrFail($driverId);

        $request->validate([
            'date' => 'required|date',
            'start_time' => [
                'required',
                'date_format:H:i',
                function ($attribute, $value, $fail) use ($driverId, $request) {
                    $query = Schedule::where('driver_id', $driverId)

                        ->where('import_id', $request->input('import_id'))
                        ->where('export_id', $request->input('export_id'))
                        ->where('date', $request->input('date'))
                        ->where('start_time', $request->input('start_time'))
                        ->where('end_time', '>', $request->input('start_time'));

                    if ($query->exists()) {
                        $fail('The selected start time is not available.');
                    }
                }
            ],
            'end_time' => [
                'required',
                'date_format:H:i',
                'after:start_time',
                function ($attribute, $value, $fail) use ($driverId, $request) {
                    $query = Schedule::where('driver_id', $driverId)
                        ->where('import_id', $request->input('import_id'))
                        ->where('export_id', $request->input('export_id'))
                        ->where('date', $request->input('date'))
                        ->where('end_time', $request->input('end_time'))
                        ->where('start_time', '<', $request->input('end_time'));

                    if ($query->exists()) {
                        $fail('The selected end time is not available.');
                    }
                }
            ],
        ]);

        $schedule = new Schedule();
        $schedule->driver_id = $driver->id;
        $schedule->import_id = $request->input('import_id');
        $schedule->export_id = $request->input('export_id');
        $schedule->date = $request->input('date');
        $schedule->start_time = $request->input('start_time');
        $schedule->end_time = $request->input('end_time');
        // Set other schedule fields as needed
        $schedule->save();

        Notification::send($driver->user, new ScheduleNotification($request->date));

        return redirect()->route('driver.index')->with('success', 'Schedule added successfully.');
    }

    public function edit($driverId, $scheduleId)
    {
        $driver = DriversTimetable::findOrFail($driverId);
        $schedule = Schedule::findOrFail($scheduleId);

        return view('schedules.edit', compact('schedule'))->with('schedule', $schedule);
    }

    public function update(Request $request, $scheduleId)
    {
        $input = $request->all();
        $schedule = Schedule::findOrFail($scheduleId);


        $schedule->update($input);


        return redirect('driver')
            ->with('success', 'Schedule updated successfully.');
    }

    public function destroy($scheduleId)
    {

        $schedule = Schedule::findOrFail($scheduleId);
        $driverId = $schedule->driver_id;
        $schedule->delete();

        return redirect()->route('driver.index', $driverId)
            ->with('success', 'Schedule deleted successfully.');

    }

    public function read()
    {
        $user = User::find(auth()->user()->id);
        $user->unreadNotifications->markAsRead();
        return redirect(url('/driver/' . auth()->user()->driver->id . '/schedules/index'));
    }

    public function driverView()
    {
        return redirect(url('/driver/' . auth()->user()->driver->id . '/schedules/index'));
    }
}
