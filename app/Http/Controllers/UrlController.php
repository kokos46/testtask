<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UrlStatistics;

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

    public function redirect(Request $request, string $code){
        $link = Url::where('short_url', env('APP_URL') . '/' . $code)->first();

        $link->increment('click_count');
        
        User::find(Auth::user()['id'])->increment('total_clicks');

        $link->urlStatistics()->create([
            'ip_address' => $request->ip()
        ]);

        return redirect()->away($link->source_url);
    }

    public function getStatistics(int $id){
        $linkData = Url::with('urlStatistics')->find($id);
        return view("statistics", ['linkData' => $linkData]);
    }

    public function getAllStatistics(){
        $all = UrlStatistics::all()->map(fn ($item) => [
            'id' => $item->id,
            'ip_address' => $item->ip_address,
            'link' => $item->url->short_url,
            'click_time' => $item->created_at
        ]);

        return view('allclicks', ['data' => $all]);
    }

    public function deleteLink(int $id){
        Url::find($id)->delete();
        return redirect('/');
    }
}
