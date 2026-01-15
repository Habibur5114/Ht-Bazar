<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{

    public function index()
    {
         $colors = Color::latest()->get();
        return view('Admin.color.index', compact('colors'));
    }


    public function create()
    {
        $colors = Color::get();
        return view('Admin.color.create', compact('colors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:100|unique:colors,name',
            'status' => 'required|boolean',
        ]);

        $color = Color::create($request->only('name', 'status'));

        return response()->json([
            'status'  => true,
            'message' => 'Color created successfully',
            'data'    => $color
        ], 201);
    }


    public function show($id)
    {
        $color = Color::find($id);

        if (!$color) {
            return response()->json([
                'status' => false,
                'message' => 'Color not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $color
        ]);
    }


    public function update(Request $request, $id)
    {
        $color = Color::find($id);

        if (!$color) {
            return response()->json([
                'status' => false,
                'message' => 'Color not found'
            ], 404);
        }

        $request->validate([
            'name'   => 'required|string|max:100|unique:colors,name,' . $id,
            'status' => 'required|boolean',
        ]);

        $color->update($request->only('name', 'status'));

        return response()->json([
            'status'  => true,
            'message' => 'Color updated successfully',
            'data'    => $color
        ]);
    }


    public function destroy($id)
    {
        $color = Color::find($id);

        if (!$color) {
            return response()->json([
                'status' => false,
                'message' => 'Color not found'
            ], 404);
        }

        $color->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Color deleted successfully'
        ]);
    }
}
