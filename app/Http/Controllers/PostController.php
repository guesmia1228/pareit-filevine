<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessSendingEmail;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    // [POST] : create post and send email handler
    public function store(Request $request, Website $website)
    {
        $attributes = $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        try {
            DB::beginTransaction();

            $user = User::updateOrCreate([
                'email' => $attributes['email']
            ], [
                'name' => $attributes['name'],
            ]);

            $post = $website->posts()->create([
                'user_id' => $user->id,
                'title' => $attributes['title'],
                'description' => $attributes['description'],
            ]);

            ProcessSendingEmail::dispatch($post);

            DB::commit();
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        return response()->json($post);
    }
}
