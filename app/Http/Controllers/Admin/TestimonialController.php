<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonal;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the testimonials.
     */
    public function index()
    {
        $testimonials = Testimonal::orderBy('created_at', 'desc')->get();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new testimonial.
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created testimonial in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        try {
            $image = $request->file('image');
            $imageName = time() . '_image.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/testimonials'), $imageName);
            $validated['image'] = 'uploads/testimonials/' . $imageName;

            Testimonal::create($validated);

            return $request->ajax()
                ? response()->json([
                    'success' => true,
                    'message' => 'Testimonial created successfully!',
                    'redirect_url' => route('admin.testimonial.index')
                ])
                : redirect()->route('admin.testimonial.index')->with('success', 'Testimonial created successfully!');
        } catch (\Exception $e) {
            if (isset($validated['image'])) {
                @unlink(public_path($validated['image']));
            }

            return $request->ajax()
                ? response()->json([
                    'success' => false,
                    'message' => 'Creation failed: ' . $e->getMessage()
                ], 500)
                : redirect()->route('admin.testimonial.index')->with('error', 'Creation failed!');
        }
    }

    /**
     * Show the form for editing the specified testimonial.
     */
    public function edit(string $id)
    {
        $testimonial = Testimonal::findOrFail($id);
        return view('admin.testimonial.create', compact('testimonial'));
    }

    /**
     * Update the specified testimonial in storage.
     */
    public function update(Request $request, string $id)
    {
        $testimonial = Testimonal::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        try {
            if ($request->hasFile('image')) {
                // Delete old image if it exists
                if ($testimonial->image && file_exists(public_path($testimonial->image))) {
                    @unlink(public_path($testimonial->image));
                }

                // Upload new image
                $image = $request->file('image');
                $imageName = time() . '_image.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/testimonials'), $imageName);
                $validated['image'] = 'uploads/testimonials/' . $imageName;
            }

            $testimonial->update($validated);

            return $request->ajax()
                ? response()->json([
                    'success' => true,
                    'message' => 'Testimonial updated successfully!',
                    'redirect_url' => route('admin.testimonial.index')
                ])
                : redirect()->route('admin.testimonial.index')->with('success', 'Testimonial updated successfully!');
        } catch (\Exception $e) {
            return $request->ajax()
                ? response()->json([
                    'success' => false,
                    'message' => 'Update failed: ' . $e->getMessage()
                ], 500)
                : redirect()->route('admin.testimonial.index')->with('error', 'Update failed: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified testimonial from storage.
     */
    public function destroy(Request $request, string $id)
    {
        try {
            $testimonial = Testimonal::findOrFail($id);

            if ($testimonial->image && file_exists(public_path($testimonial->image))) {
                @unlink(public_path($testimonial->image));
            }

            $testimonial->delete();

            return $request->ajax()
                ? response()->json([
                    'success' => true,
                    'message' => 'Testimonial deleted successfully!',
                    'redirect_url' => route('admin.testimonial.index')
                ])
                : redirect()->route('admin.testimonial.index')->with('success', 'Testimonial deleted successfully!');
        } catch (\Exception $e) {
            return $request->ajax()
                ? response()->json([
                    'success' => false,
                    'message' => 'Failed to delete testimonial: ' . $e->getMessage()
                ], 500)
                : redirect()->route('admin.testimonial.index')->with('error', 'Failed to delete testimonial!');
        }
    }
}
