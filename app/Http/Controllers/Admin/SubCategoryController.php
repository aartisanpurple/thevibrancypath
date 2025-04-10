<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::all();
        return view('admin.subcategory.index', compact('subcategories'));
    }
 
    public function show($id = null)
    {
        $category = Category::all();
        $selectedCategory = null;
        if ($id) {
            $selectedCategory = Category::select('id')->findOrFail($id);
        }
        $subCategories = SubCategory::where('parent_id', $id)->get();
        //$subCategory = SubCategory::findOrFail($request->sub_category_id) : null;
        return view('admin.category.createsubcategory', compact('category', 'subCategories','selectedCategory'));
    }

    public function store(Request $request)
    {
        // Check if this is an update (if sub_category_id is present)
        $isUpdate = $request->has('subcategory_id');
        if($isUpdate && $request->subcategory_id){
            $subCategory = SubCategory::findOrFail($request->subcategory_id);
        }
        else{
            $subCategory = null;
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            'parent_id' => 'required|exists:category,id',
        ]); 

        // Check if sub-category with same name already exists under same parent
        if($isUpdate){  
            $exists = SubCategory::where('name', 'like', '%' . $request->name . '%')->where('parent_id', $request->parent_id)->where('id', '!=', $request->subcategory_id)->exists();
        }
        else{
            $exists = SubCategory::where('name', 'like', '%' . $request->name . '%')->where('parent_id', $request->parent_id)->exists();
        }

        if ($exists) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => [
                        'name' => 'This sub-category already exists under the selected category.'
                    ]
                ], 422); // 422 Unprocessable Entity for validation errors
            }
            return redirect()->back()
                ->withErrors(['name' => 'This sub-category already exists under the selected category.'])
                ->withInput();
        }
        try {
            if ($isUpdate && $request->subcategory_id) {
                $subCategory->update([
                    'name' => $request->name,
                    'status' => $request->status,
                    'parent_id' => $request->parent_id,
                ]);
                $message = 'Sub Category updated successfully!';
            }
            else{
                // Create the sub category
                $subCategory = SubCategory::create([
                    'name' => $validated['name'],
                    'status' => $validated['status'],
                    'parent_id' => $validated['parent_id'],
                ]);
                $message = 'Sub Category added successfully!';
            }

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'subCategory' => $subCategory,
                    'message' => $message,
                    'redirect_url' => route('admin.category.index') // Pass the URL
                ]);
            }
            // Redirect back with a success message
            return redirect()->route('admin.category.index')->with('success', $message);
        } catch (\Exception $e) {
            return redirect()->route('admin.category.index')->with('error', 'Failed to add sub category: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        // Get the subcategory we're editing
        $subcategory = SubCategory::findOrFail($id);
    
        // Get the parent category of this subcategory
        $selectedCategory = Category::findOrFail($subcategory->parent_id);
        $parentCategory = null;
        if($selectedCategory){
            $parentCategory = $selectedCategory->id;
        }
        // Get all active categories for the dropdown
        $category = Category::where('category_status', 0)->get();
    
        // Also get all active subcategories for listing
        $subcategories = SubCategory::where('status', 0)->get();
        
        // Pass everything to the view
        return view('admin.category.createsubcategory', compact(
            'selectedCategory',
            'subcategory',
            'subcategories',
            'category',
            'parentCategory'
        ));
    }

    public function destroy(Request $request, $id)
    {
        try {
            $subCategory = SubCategory::findOrFail($id);
            $subCategory->delete();
            if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Sub Category deleted successfully!',
                'redirect_url' => route('admin.category.index')
            ]);
        }
            return redirect()->route('admin.category.index')->with('success', 'Sub Category deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.category.index')->with('error', 'Failed to delete sub category: ' . $e->getMessage());
        }
    }
    
}
