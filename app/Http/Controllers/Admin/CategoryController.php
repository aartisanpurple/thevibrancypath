<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function index()
    {
 
     $categories = Category::with(['subcategories' => function ($query) {
            $query->select('id', 'name', 'status as sub_status', 'parent_id','deleted_at');
        }])
        ->select('id', 'name', 'category_status','deleted_at')
        ->orderBy('name', 'asc')
        ->get();

    

        return view('admin.category.index', compact('categories'));
    }
    // Show the form for adding a new category
    public function create()
    {
        $categories = Category::where('category_status', 0)->get();
        return view('admin.category.create', compact('categories'));
    }

    // Store a new category
    public function store(Request $request)
    {
        // Check if this is an update (if category_id is present)
        $isUpdate = $request->has('category_id');
        // Get the category if updating
        $category = $isUpdate ? Category::findOrFail($request->category_id) : null; 
        //dd($category);
        // Validate the form input
        $validationRules = [
            'name' => 'required|string|max:255',
            'category_status' => 'required|in:0,1',
        ];
        if ($isUpdate) {
            $validationRules['category_id'] = 'required|exists:category,id';
        }
        $exists = Category::where('name', 'like', '%' . $request->name . '%')->exists();
        if($exists){
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => [
                        'name' => 'This category already exists.'
                    ]
                ], 422); // 422 Unprocessable Entity for validation errors
            }
            return redirect()->back()
                ->withErrors(['name' => 'This category already exists.'])
                ->withInput();
        }
        $request->validate($validationRules);
        try {
            //dd($request->all());
            if ($isUpdate) {
                $category->update([ 
                    'name' => $request->name,
                    'category_status' => $request->category_status,
                ]);
                $message = 'Category updated successfully!';
            }else{
                // Create the category
                $category = Category::create([
                    'name' => $request->name,
                    'category_status' => $request->category_status,
                ]);
                $message = 'Category added successfully!';
            }
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'category' => $category,
                    'message' => $message,
                    'redirect_url' => route('admin.category.create') // Pass the URL
                ]);
            }
           // Redirect back with a success message
            return redirect()->route('admin.category.create')->with('success', $message);
        } catch (\Exception $e) {
            return redirect()->route('admin.category.create')->with('error', 'Failed to add category: ' . $e->getMessage());
        }
    }  
    public function show($id = null)
    {
        $category = Category::all();
        $selectedCategory = null;
        if ($id) {
            $selectedCategory = Category::select('id')->findOrFail($id);
        }
        $subCategories = SubCategory::where('parent_id', $id)->get();
        return view('admin.category.createsubcategory', compact('category', 'subCategories','selectedCategory'));
    }

    public function createSubCategory($id = null)
    {
        $categories = Category::where('category_status', 0)->get();
         // Get the selected category if ID is provided
        $selectedCategory = null;
        if ($id) {
            $selectedCategory = Category::findOrFail($id);
        }
        return view('admin.category.createsubcategory', compact('categories','selectedCategory'));
    }

    public function destroy(Request $request, $id)
    {
        try {
            $category = Category::findOrFail($id);
            $subCategories = SubCategory::where('parent_id', $id)->get();
            if ($subCategories->count() > 0) {
                foreach ($subCategories as $subCategory) {
                    $subCategory->delete();
                }
            }
            $category->delete();
            if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Category deleted successfully!',
                'redirect_url' => route('admin.category.index')
            ]);
        }
            return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.category.index')->with('error', 'Failed to delete category: ' . $e->getMessage());
        }
    }  

    public function edit($id){
        $category = Category::findOrFail($id);
        $categories = Category::where('category_status', 0)->get();
        return view('admin.category.create', compact('category', 'categories'));
    }

}
