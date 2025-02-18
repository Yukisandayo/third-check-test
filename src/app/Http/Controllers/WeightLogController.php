<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Weight_logRequest;
use App\Models\Weight_log;
use Illuminate\Support\Facades\Auth;

class WeightLogController extends Controller
{
    public function store(Weight_logRequest $request)
    {
        Weight_log::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'weight' => $request->weight,
            'calories' => $request->calories,
            'exercise_time' => $request->exercise_time,
            'exercise_content' => $request->exercise_content,
        ]);

        return redirect()->route('weight_logs');
    }

    public function show($weightLogId)
    {
        $weightLog = Weight_log::find($weightLogId);
        return view('weight.logs', compact('weightLog'));
    }

    public function update(Request $request, $weightLogId)
    {
        $weightLog = Weight_log::find($weightLogId);
        $weightLog->update($request->all());
        return redirect()->route('weight_logs');
    }

    public function destroy($weightLogId)
    {
        Weight_log::find($weightLogId)->delete();
        return redirect()->route('weight_logs');
    }

    public function search(Weight_logRequest $request)
    {
        $query = WeightLog::query();

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        $weightLogs = $query->orderBy('date', 'desc')->paginate(10);

        return view('weight_logs', compact('weightLogs'));
    }
}
