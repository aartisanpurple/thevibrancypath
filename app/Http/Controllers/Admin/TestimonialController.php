<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonal;
class TestimonialController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $testimonials = Testimonal::orderBy('created_at', 'desc')->get();
    return view('admin.testimonial.index', compact('testimonials'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.testimonial.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request, $id = null)
  {
    $testimonialId = null;
    if ($id) {
      $testimonialId = Testimonal::findOrFail($id);
    }

    // Set validation rules based on whether we're creating or updating
    $validationRules = [
      'name' => 'required',
      'message' => 'required',
    ];

    // Image is required only for new testimonials
    if (!$testimonialId) {
      $validationRules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
    } else {
      $validationRules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
    }

    try {
      $validated = $request->validate($validationRules);

      if ($testimonialId) {
        // Update existing testimonial
        $updateData = [
          'name' => $request->name,
          'message' => $request->message,
        ];

        // Only update image if a new one is uploaded
        if ($request->hasFile('image')) {
          // Delete old image if exists
          if ($testimonialId->image && file_exists(public_path($testimonialId->image))) {
            unlink(public_path($testimonialId->image));
          }
          // Upload new image
          $image = $request->file('image');
          $imageName = time() . '_image.' . $image->getClientOriginalExtension();
          $image->move(public_path('uploads/testimonials'), $imageName);
          $updateData['image'] = 'uploads/testimonials/' . $imageName;
        }

        $testimonialId->update($updateData);
      } else {
        // Create new testimonial
        $image = $request->file('image');
        $imageName = time() . '_image.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/testimonials'), $imageName);
        $validated['image'] = 'uploads/testimonials/' . $imageName;

        $testimonial = Testimonal::create($validated);
      }

      if ($request->ajax()) {
        return response()->json([
          'success' => true,  
          'message' => $testimonialId ? 'Testimonial updated successfully!' : 'Testimonial created successfully!',
          'redirect_url' => route('admin.testimonial.index')
        ]);
      }
      return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial created successfully!');
    } catch (\Illuminate\Validation\ValidationException $e) {
      if ($request->ajax()) {
        return response()->json([
          'success' => false,
          'message' => 'Validation failed',
          'errors' => $e->errors()
        ], 422);
      }
      throw $e;
    } catch (\Exception $e) {
      if (isset($validated['image'])) {
        unlink(public_path($validated['image']));
      }
      if ($request->ajax()) {
        return response()->json([
          'success' => false,
          'message' => 'Testimonial creation failed: ' . $e->getMessage()
        ], 500);
      }
      return redirect()->route('admin.testimonial.index')->with('error', 'Testimonial creation failed!');
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $testimonial = Testimonal::findOrFail($id);
    return view('admin.testimonial.create', compact('testimonial'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    try {
      $testimonal = Testimonal::findOrFail($id);
      $testimonal->delete();
      
      if ($request->ajax()) {
          return response()->json([
              'success' => true,
              'message' => 'Testimonal deleted successfully!',
              'redirect_url' => route('admin.testimonal.index')
          ]);
      }
      return redirect()->route('admin.testimonal.index')->with('success', 'Testimonal deleted successfully!');
  } catch (\Exception $e) {
      if ($request->ajax()) {
          return response()->json([
              'success' => false,
              'message' => 'Failed to delete testimonal: ' . $e->getMessage()
          ], 500);
      }
      return redirect()->route('admin.testimonal.index')->with('error', 'Failed to delete testimonal: ' . $e->getMessage());
  }
  }
}
