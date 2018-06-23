<?php

namespace App\Http\Controllers;

use App\Models\Song;

class BeatSaverController extends Controller
{
    /**
     * View for login / register
     */
    public function viewLogin()
    {
        return view('pages.auth.login');
    }

    /**
     * View for login / register
     */
    public function viewNewest()
    {
        $songs = Song::orderBy('created_at', 'desc')->with('details')->paginate(25);

        return view('pages.newest', compact('songs'));
    }

    /**
     * View for most popular songs
     */
    public function viewTopDownloads()
    {
        $songs = Song::with(['details' => function($query) {
            $query->orderBy('download_count', 'desc');
        }])->paginate(25);

        return view('pages.top-downloads', compact('songs'));
    }

    /**
     * View for most popular songs
     */
    public function viewTopStars()
    {
        $songs = Song::withCount('stars')->orderBy('stars_count')->paginate(25);

        return view('pages.top-downloads', compact('songs'));
    }
}
