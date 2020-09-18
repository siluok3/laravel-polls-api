<?php

namespace App\Http\Controllers;

use App\Http\Resources\Poll as ResourcesPoll;
use App\Models\Poll;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PollsController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Poll::paginate(1), 200);
    }

    public function show(int $id): JsonResponse
    {
        $poll = Poll::with('questions')->findOrFail($id);
        $response['poll'] = $poll;
        $response['questions'] = $poll->questions;
        $formattedResponse = new ResourcesPoll($response, 200);

        return response()->json($formattedResponse, 200);
    }

    public function store(Request $request): JsonResponse
    {
        $rules = [
            'title' => 'required|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

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

    public function errors(): JsonResponse
    {
        return response()->json(['message' => 'Oops, not implemented yet'], 501);
    }

    public function questions(Poll $poll): JsonResponse
    {
        $questions = $poll->questions;

        return response()->json($questions, 200);
    }
}
