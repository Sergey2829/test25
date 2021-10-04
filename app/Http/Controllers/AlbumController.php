<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlbumResource;
use App\Http\Resources\BaseCollection;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AlbumController extends Controller
{

    public function index(Request $request)
    {
        $limit = $this->getLimit($request->limit);

        return response()->json(
            new BaseCollection(Album::select('id', 'title')->paginate($limit)),
            Response::HTTP_OK);
    }


    public function show(Album $album)
    {
        return response()->json(new AlbumResource($album));
    }


}
