<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends Controller
{
// GET /api/students
public function index(Request $request)
{
    $user = $request->user();

    if ($user->role === 'admin') {
        return response()->json(User::all());
    }

    if ($user->role === 'teacher') {
        return response()->json(User::where('role', 'student')->get());
    }

    if ($user->role === 'student') {
        return response()->json($user); // only self data
    }

    return response()->json(['message' => 'Unauthorized'], 403);
}

    public function show(Request $request, $id)
    {
    $user = $request->user();
    $target = User::find($id);

    if (!$target) return response()->json(['message' => 'User not found'], 404);

    if ($user->role === 'admin') return response()->json($target);
    if ($user->role === 'teacher' && $target->role === 'student') return response()->json($target);
    if ($user->role === 'student' && $user->id == $id) return response()->json($target);

    return response()->json(['message' => 'Forbidden'], 403);
    }

}
