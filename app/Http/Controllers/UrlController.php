<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UrlController extends Controller
{
    // public function createPage(){
    //     return view('createurl');
    // }

    public function createShortURL(Request $request){
        $validated = $request->validate([
            'source' => 'required|regex:~^https?:\/\/([a-zA-Z0-9-]+\.)+[a-zA-Z]+(\/[^\s?#]*)?(\?[^\s#]*)?(#[^\s]*)?$~'
        ]);

        $id = Str::random(6);
        $shortUrl = env('APP_URL') . '/' . $id;

        $link = Url::create([
            'source_url' => $validated['source'],
            'short_url' => $shortUrl,
            'user_id' => Auth::user()['id'],
        ]);

        return redirect('/');
    }

    public function redirect(string $code){
        $link = Url::where('short_url', env('APP_URL') . '/' . $code)->first();

        $link->increment('click_count');
        // $link->urlStatistics()->create([

        // ]);

        return redirect()->away($link->source_url);
    }
}
