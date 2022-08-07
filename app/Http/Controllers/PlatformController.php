<?php

namespace App\Http\Controllers;

use App\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;

class PlatformController extends Controller
{
    const PAGINATE_SIZE = 10;
    public function index(Request $request) {

        $platformName = null;
        if($request->has('platformName')) {
            $platformName = $request->platformName;
            $platforms = Platform::where('name', 'like', '%' . $platformName . '%')->paginate(self::PAGINATE_SIZE);
        } else {
            $platforms = Platform::paginate(self::PAGINATE_SIZE);
        }

        return view('platforms.index', ['platforms' => $platforms, 'platformName' => $platformName]);

    }

    public function create() {
        return view('platforms.create');
    }

    public function store(Request $request) {
        $this->validatePlatform($request)->validate();

        $platform = new Platform();
        $platform->name = $request->platformName;
        $platform->save();

        return redirect()->route('platforms.index')->with('success', Lang::get('alerts.platforms_created_successfully'));
    }

    public function edit(Platform $platform) {
        return view('platforms.create', ['platform' => $platform]);
    }

    public function update(Request $request, Platform $platform) {

    }

    public function delete(Request $request, Platform $platform) {

    }

    private function validatePlatform($request) {
        return Validator::make($request->all(), [
            'platformName' => ['required', 'string', 'max:255', 'min:3']
        ]);
    }
}