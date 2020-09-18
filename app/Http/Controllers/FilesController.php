<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FilesController extends Controller
{
    public function show(): BinaryFileResponse
    {
        return response()->download(storage_path('app/TestPDF.pdf'), 'downloadble.pdf');
    }

    public function create(Request $request): JsonResponse
    {
        $path = $request->file('photo')->store('testing');

        return response()->json(['path' => $path], 200);
    }
}
