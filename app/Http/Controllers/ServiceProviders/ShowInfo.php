<?php

namespace App\Http\Controllers\ServiceProviders;

use App\Http\Controllers\Controller;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;

class ShowInfo extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $userId)
    {
        $info = ServiceProvider::with('profile')->findOrFail($userId);
        return view('provider.info',compact('info'));
    }
}
