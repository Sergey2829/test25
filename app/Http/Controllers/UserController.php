<?php

namespace App\Http\Controllers;

use App\Http\Resources\BaseCollection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(Request $request)
    {
        $limit = $this->getLimit($request->limit);

        return response()->json(
            new BaseCollection($this->user->getBaseInfo()->paginate($limit)),
            Response::HTTP_OK);
    }

    public function show($id)
    {
        return response()->json(
            $this->user->getBaseInfo()->find($id),
            Response::HTTP_OK
        );
    }
}
