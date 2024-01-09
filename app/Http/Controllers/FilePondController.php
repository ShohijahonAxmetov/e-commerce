<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Traits\FilePondTrait;

class FilePondController extends Controller
{
    use FilePondTrait;
    public function process(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'variations.*.files' => 'required|array',
            'variations.*.files.*' => 'required|file|max:5120'
        ]);
        if ($validator->fails()) {
            return response($validator->errors(), 500);
        }

        $itemKey = array_keys($request->file('variations'))[0];
        $file = array_values($request->file('variations'))[0]['files'][0];

        $fileName = $this->filePondProcess($file);

        if (!session()->has('files')) {
            $sessionFiles['variations'][$itemKey][0] = $fileName;
        } else {
            $sessionFiles = session('files');
            if (!isset(session('files')['variations'][$itemKey][0])) {
                $sessionFiles['variations'][$itemKey][0] = $fileName;
            } else {
                $sessionFiles['variations'][$itemKey][] = $fileName;
            }
        }
        session(['files' => $sessionFiles]);

        return $fileName;
    }

    public function revert(Request $request)
    {
        $file = $request->getContent();

        $this->filePondRevert($file);

        $sessionFiles = session('files');
        foreach ($sessionFiles['variations'] as $variationKey => $variation) {
            foreach ($variation as $key => $sessionFile) {
                if ($sessionFile == $file) {
                    unset($sessionFiles['variations'][$variationKey][$key]);
                    $sessionFiles['variations'][$variationKey] = array_values($sessionFiles['variations'][$variationKey]);
                }
            }
        }
        session(['files' => $sessionFiles]);

        return '';
    }

    public function load(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|max:255'
        ]);
        if ($validator->fails()) {
            return response($validator->errors(), 500);
        }

        $response = \Illuminate\Support\Facades\Response::make(File::get(public_path('storage/'.$request->input('file'))));
        $response->header('Content-Disposition', 'inline; filename="'.$request->input('file').'"');

        return $response;
    }

    public function remove(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|max:255'
        ]);
        if ($validator->fails()) {
            return response($validator->errors(), 500);
        }

        $file = $request->input('file');

        $this->filePondRemove($file);

        $sessionFiles = session('files');
        foreach ($sessionFiles['variations'] as $variationKey => $variation) {
            foreach ($variation as $key => $sessionFile) {
                if ($sessionFile == $file) {
                    unset($sessionFiles['variations'][$variationKey][$key]);
                    $sessionFiles['variations'][$variationKey] = array_values($sessionFiles['variations'][$variationKey]);
                }
            }
        }
        session(['files' => $sessionFiles]);

        return '';
    }
}
