<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class FeedBackController extends Controller
{
    public function index(Request $request) {
        try {
            $request->except('_token');
            Feedback::create([
                'name' => (string) $request->input('name'),
                'phone' => (string) $request->input('phone'),
                'email' => (string) $request->input('email'),
                'feedback' => (string) $request->input('feedback'),
                'status' => 0,
            ]);
            Session::flash('success', 'Gửi phản hồi thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            Log::error("--------- start err create ---------");
            Log::error($err);
            Log::error("--------- end err create ---------");
            // return redirect()->back();
        }

        // return redirect()->back();
    }
}
