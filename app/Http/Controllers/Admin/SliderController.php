<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('Admin.slider.index', compact('sliders'));
    }


    public function create()
    {
        return view('Admin.slider.create');
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|url',
            'status' => 'required|boolean',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/sliders'), $imageName);
            $data['image'] = 'uploads/sliders/' . $imageName;
        }

        Slider::create($data);

        return redirect()->route('admin.slider.index')
            ->with('success', 'Slider created successfully!');
    }


    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|url',
            'status' => 'required|boolean',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {


            if ($slider->image && File::exists(public_path($slider->image))) {
                File::delete(public_path($slider->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/sliders'), $imageName);
            $data['image'] = 'uploads/sliders/' . $imageName;
        }

        $slider->update($data);

        return redirect()->route('admin.slider.index')
            ->with('success', 'Slider updated successfully!');
    }


    public function delete($id)
    {
        $slider = Slider::findOrFail($id);

        if ($slider->image && File::exists(public_path($slider->image))) {
            File::delete(public_path($slider->image));
        }

        $slider->delete();

        return redirect()->route('admin.slider.index')
            ->with('success', 'Slider deleted successfully!');
    }
}
