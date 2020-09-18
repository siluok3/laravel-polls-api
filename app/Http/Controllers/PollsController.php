<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PollsController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Poll::get(), 200);
    }

    public function show(int $id): JsonResponse
    {
        return response()->json(Poll::find($id), 200);
    }

    public function store(Request $request): JsonResponse
    {
        $poll = Poll::create($request->all());

        return response()->json($poll, 201);
    }

    public function update(Request $request, Poll $poll): JsonResponse
    {
        $poll->update($request->all());

        return response()->json($poll, 200);
    }

    public function delete(Poll $poll): JsonResponse
    {
        $poll->delete();

        return response()->json(null, 204);
    }
}