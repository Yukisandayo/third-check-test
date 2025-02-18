<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weight_target;
use App\Http\Requests\Weight_targetRequest;
use Illuminate\Support\Facades\Auth;

class TargetWeightController extends Controller
{
    public function edit()
    {
        $targetWeight = Weight_target::where('user_id', Auth::id())->first();
        return view('weight_setting', compact('targetWeight'));
    }

    public function update(Weight_targetRequest $request)
    {
        Weight_target::updateOrCreate(
            ['user_id' => Auth::id()],
            ['target_weight' => $request->target_weight]
        );

        return redirect()->route('weight_logs');
    }
}
