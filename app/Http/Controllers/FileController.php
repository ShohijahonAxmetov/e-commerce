<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,png,jpeg,webp|max:5120',
        ]);

        $path = Storage::putFile('tmp', $request->file('file'));

        $sessionData = $request->session()->has(auth('admin')->id()) ? $request->session()->get(auth('admin')->id()) : [];
        $sessionData[] = $path;

        $request->session()->put(auth('admin')->id(), $sessionData);

        return response($request->session()->get(auth('admin')->id()));
    }
}
