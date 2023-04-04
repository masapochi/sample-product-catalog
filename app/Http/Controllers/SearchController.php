<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke()
    {
        $q = request()->q;

        if (!$q) return redirect()->route('home');

        $items = Item::where('name', 'like', "%{$q}%")->get();
        return view('search', [
            'items' => $items,
        ]);
    }
}
