<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'name' => 'required|string|max:100|unique:colors,name',
            'status' => 'required|boolean',
        ]);

        Color::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.color.index')
            ->with('success', 'Color created successfully!');
    }

    public function edit($id)
    {
        $color = Color::find($id);

        if (! $color) {
            return response()->json([
                'status' => false,
                'message' => 'Color not found',
            ], 404);
        }

        return view('Admin.color.edit', compact('color'));
    }

    public function update(Request $request, $id)
    {
        $color = Color::find($id);

        if (! $color) {
            return response()->json([
                'status' => false,
                'message' => 'Color not found',
            ], 404);
        }

        $request->validate([
            'name' => 'required|string|max:100|unique:colors,name,'.$id,
            'status' => 'required|boolean',
        ]);

        $color->update($request->only('name', 'status'));

        return redirect()
            ->route('admin.color.index')
            ->with('success', 'Color updated successfully!');
    }

    public function delete($id)
    {
        $color = Color::find($id);

        if (! $color) {
            return response()->json([
                'status' => false,
                'message' => 'Color not found',
            ], 404);
        }

        $color->delete();

        return redirect()
            ->route('admin.color.index')
            ->with('success', 'Color deleted successfully!');

    }
}
