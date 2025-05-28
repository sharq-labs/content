<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Platform\PlatformSelectionRequest;
use Illuminate\Http\Request;

class UserPlatformController extends Controller
{
    public function index(Request $request)
    {
        $platforms = $request->user()->platforms()->get();
        return $this->success($platforms, 'User selected platforms.');
    }

    public function update(PlatformSelectionRequest $request)
    {
        $user = $request->user();
        $validated = $request->validated();
        $user->platforms()->sync($validated['platform_ids']);
        return $this->success($user->platforms, 'User platforms updated successfully.');
    }

}
