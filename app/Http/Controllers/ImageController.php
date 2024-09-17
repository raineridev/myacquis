<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Http\Response;


class ImageController extends Controller
{
    private $idByToken;

    public function __contruct(Request $request)
    {
        $this->idByToken = PersonalAccessToken::findToken($request->bearerToken())->id;
    }

    public function store(ImageRequest $request)
    {
        $path = Storage::put('profile' . $this->idByToken .'/images' , $request->file('image'), 'public');
        return $path;
    }

    public function show($filename)
    {
        $path = Storage::url('images/' . $filename);
        return $path;
    }

    public function download($id)
    {
        $s3Client = Storage::download('images/' . $id);
        return $s3Client;
    }


    public function destroy($id)
    {
        Storage::delete('images/' . $id);
    }

    public function visibility($id, $visibility)
    {
        Storage::setVisibility('images/' . $id, $visibility);

        return response()->json([
            'message' => 'Visibility changed',
            'id' => $id,
            'visibility' => Storage::visibility('images/' . $id)
        ]);
    }
}
