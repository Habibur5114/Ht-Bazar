<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;
use Illuminate\Support\Str;

class SizeController extends Controller
{
     public function index()
    {
        $sizes = Size::latest()->get();

        return view('Admin.size.index', compact('sizes'));
    }

    public function create()
    {
        $sizes = Size::get();

        return view('Admin.size.create', compact('sizes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:sizes,name',
            'status' => 'required|boolean',
        ]);

        Size::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.size.index')
            ->with('success', 'Size created successfully!');
    }

    public function edit($id)
    {
        $size = Size::find($id);

        if (! $size) {
            return response()->json([
                'status' => false,
                'message' => 'Size not found',
            ], 404);
        }

        return view('Admin.size.edit', compact('size'));
    }

    public function update(Request $request, $id)
    {
        $size = Size::find($id);
        if (! $size) {
            return response()->json([
                'status' => false,
                'message' => 'Size not found',
            ], 404);
        }

        $request->validate([
            'name' => 'required|string|max:100|unique:sizes,name,'.$id,
            'status' => 'required|boolean',
        ]);

        $size->update($request->only('name', 'status'));

        return redirect()
            ->route('admin.size.index')
            ->with('success', 'Size updated successfully!');
    }

    public function delete($id)
    {
        $size = Size::find($id);

        if (! $size) {
            return response()->json([
                'status' => false,
                'message' => 'Size not found',
            ], 404);
        }

        $size->delete();

        return redirect()
            ->route('admin.size.index')
            ->with('success', 'Size deleted successfully!');

    }
}
