<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\AuthRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Weight_registerRequest;
use App\Http\Requests\Weight_logRequest;
use App\Models\User;
use App\Models\Weight_log;
use App\Models\Weight_target;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function register()
    {
        return view('auth.register.step1');
    }

    public function storeStep1(AuthRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        Auth::login($user);

        return redirect()->route('register.step2');
    }

    public function showStep2()
    {
        if (!Auth::check()) {
            return redirect()->route('register');
        }
        return view('auth.register.step2');
    }

    public function storeStep2(Weight_registerRequest $request)
    {
        if (!Auth::check()) {
            return redirect()->route('register');
        }

        \DB::transaction(function () use ($request) {

        Weight_target::create([
                'user_id' => Auth::id(),
                'target_weight' => $request->target_weight,
            ]);

            Weight_log::create([
                'user_id' => Auth::id(),
                'date' => now()->toDateString(),
                'weight' => $request->weight,
                'calories' => 0,
                'exercise_time' => '00:00',
                'exercise_content' => '',
            ]);

        });

        return redirect()->route('admin');
    }

    public function admin()
    {
        $targetWeight = Weight_target::where('user_id', $user_id)->first();

        $latestWeightLog = Weight_log::where('user_id', $user_id)
                            ->orderBy('date', 'desc')
                            ->first();

        $weightLogs = Weight_log::where('user_id', $user_id)
                        ->orderBy('date', 'desc')
                        ->paginate(10);

        return view('weight.logs', compact('targetWeight', 'latestWeightLog', 'weightLogs'));
    }
}
