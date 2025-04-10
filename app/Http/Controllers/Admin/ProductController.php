<?php

namespace App\Http\Controllers\Admin;
use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::leftJoin('subcategory', 'products.subcategory_id', '=', 'subcategory.id')
                ->leftJoin('category', 'subcategory.parent_id', '=', 'category.id')
                ->select(
                    'products.*',
                    'subcategory.id as subcategory_id',
                    'subcategory.name as subcategory_name',
                    'category.id as category_id',
                    'category.name as category_name'
                )
                ->latest('products.created_at')
                ->get();
        // dd($products);
        // $products = Product::with('category')
        // ->leftJoin('subcategory', 'subcategory.parent_id', '=', 'products.subcategory_id')
        // ->select(
        //     'products.*',
        //     'subcategory.id as subcategory_id',
        //     'subcategory.name as subcategory_name'
        // )->latest('products.created_at')->get();
         return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('category_status', 0)->get();
        return view('admin.products.create', compact('categories'));
    }

    public function stores(Request $request)
    {
        dd($request->all());
        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'category_type' => 'required',
            'stock' => 'required|integer|min:0',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_back' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_left' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'course_doc' => 'nullable|mimes:pdf,doc,docx|max:10240',
            'course_url' => 'nullable|url',
            'course_status' => 'in:0,1',
            'product_status' => 'required|in:0,1,2'
        ]);
         // Handle image uploads
         if ($request->hasFile('image')) {
            $frontImage = $request->file('image');
            $frontImageName = time() . '_front.' . $frontImage->getClientOriginalExtension();
            $frontImage->move(public_path('uploads/products'), $frontImageName);
            $validated['image'] = 'uploads/products/' . $frontImageName;
        }

        if ($request->hasFile('image_back')) {
            $backImage = $request->file('image_back');
            $backImageName = time() . '_back.' . $backImage->getClientOriginalExtension();
            $backImage->move(public_path('uploads/products'), $backImageName);
            $validated['image_back'] = 'uploads/products/' . $backImageName;
        }

        if ($request->hasFile('image_left')) {
            $leftImage = $request->file('image_left');
            $leftImageName = time() . '_left.' . $leftImage->getClientOriginalExtension();
            $leftImage->move(public_path('uploads/products'), $leftImageName);
            $validated['image_left'] = 'uploads/products/' . $leftImageName;
        }

        // Handle course document if uploaded
        if ($request->hasFile('course_doc')) {
            $courseDoc = $request->file('course_doc');
            $docName = time() . '_doc.' . $courseDoc->getClientOriginalExtension();
            $courseDoc->move(public_path('uploads/courses'), $docName);
            $validated['course_doc'] = 'uploads/courses/' . $docName;
        }

        try {
            Product::create($validated);
            return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully');

            //code...
        } catch (\Throwable $th) {
            // Delete uploaded files if product creation fails
            if (isset($validated['image'])) {
                unlink(public_path($validated['image']));
            }
            if (isset($validated['image_back'])) {
                unlink(public_path($validated['image_back']));
            }
            if (isset($validated['image_left'])) {
                unlink(public_path($validated['image_left']));
            }
            if (isset($validated['course_doc'])) {
                unlink(public_path($validated['course_doc']));
            }

            return back()->withInput()
                ->withErrors(['error' => 'Failed to create product. ' . $e->getMessage()]);
        }
    }
    public function storeeee(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required',
            'stock' => 'required|integer|min:0',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_back' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_left' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'course_doc' => 'nullable|mimes:pdf,doc,docx|max:10240',
            'course_url' => 'nullable|url',
            'course_status' => 'in:0,1',
            'product_status' => 'required|in:0,1,2'
        ]);
         // Handle image uploads
         if ($request->hasFile('image')) {
            $frontImage = $request->file('image');
            $frontImageName = time() . '_front.' . $frontImage->getClientOriginalExtension();
            $frontImage->move(public_path('uploads/products'), $frontImageName);
            $validated['image'] = 'uploads/products/' . $frontImageName;
        }

        if ($request->hasFile('image_back')) {
            $backImage = $request->file('image_back');
            $backImageName = time() . '_back.' . $backImage->getClientOriginalExtension();
            $backImage->move(public_path('uploads/products'), $backImageName);
            $validated['image_back'] = 'uploads/products/' . $backImageName;
        }

        if ($request->hasFile('image_left')) {
            $leftImage = $request->file('image_left');
            $leftImageName = time() . '_left.' . $leftImage->getClientOriginalExtension();
            $leftImage->move(public_path('uploads/products'), $leftImageName);
            $validated['image_left'] = 'uploads/products/' . $leftImageName;
        }

        // Handle course document if uploaded
        if ($request->hasFile('course_doc')) {
            $courseDoc = $request->file('course_doc');
            $docName = time() . '_doc.' . $courseDoc->getClientOriginalExtension();
            $courseDoc->move(public_path('uploads/courses'), $docName);
            $validated['course_doc'] = 'uploads/courses/' . $docName;
        }

        try {
            $product = Product::create($validated);
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Product created successfully!',
                    'product' => $product,
                    'redirect_url' => route('admin.products.index') // Pass the URL

                ]);
            }
    
            return redirect()->route('admin.products.index')
                ->with('success', 'Product created successfully!');
    

            //code...
        } catch (\Throwable $th) {
            // Delete uploaded files if product creation fails
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to create product: ' . $th->getMessage()
                ], 500);
            }
    
            return back()->withInput()
                ->with('error', 'Failed to create product: ' . $th->getMessage());
        }
    }

    public function store(Request $request)
    {
        // Check if this is an update (if product_id is present)
        $isUpdate = $request->has('product_id');
        $categoryId = $request->input('category_id');
        $hasSubcategories = SubCategory::where('parent_id', $categoryId)->exists();

        // Get the product if updating
        $product = $isUpdate ? Product::findOrFail($request->product_id) : null;

        // Validation rules
        $validationRules = [
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required',
            'stock' => 'required|integer|min:0',
            'product_status' => 'required|in:0,1,2',
            'course_doc' => 'nullable|mimes:pdf,doc,docx|max:10240',
            'course_url' => 'nullable|url',
            'course_status' => 'in:0,1',
        ];

        if ($hasSubcategories) {
            $validationRules['subcategory_id'] = 'required|exists:subcategory,id';
        }
    
        // Modify image validation rules for update
        if ($isUpdate) {
            $validationRules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
            $validationRules['image_back'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
            $validationRules['image_left'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
        } else {
            $validationRules['image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
            $validationRules['image_back'] = 'image|mimes:jpeg,png,jpg,gif|max:2048';
            $validationRules['image_left'] = 'image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        $validated = $request->validate($validationRules);

        try {
            // Handle image uploads
            if ($request->hasFile('image')) {
                // Delete old image if updating
                if ($isUpdate && $product->image && file_exists(public_path($product->image))) {
                    unlink(public_path($product->image));
                }
                $frontImage = $request->file('image');
                $frontImageName = time() . '_front.' . $frontImage->getClientOriginalExtension();
                $frontImage->move(public_path('uploads/products'), $frontImageName);
                $validated['image'] = 'uploads/products/' . $frontImageName;
            }

            if ($request->hasFile('image_back')) {
                if ($isUpdate && $product->image_back && file_exists(public_path($product->image_back))) {
                    unlink(public_path($product->image_back));
                }
                $backImage = $request->file('image_back');
                $backImageName = time() . '_back.' . $backImage->getClientOriginalExtension();
                $backImage->move(public_path('uploads/products'), $backImageName);
                $validated['image_back'] = 'uploads/products/' . $backImageName;
            }

            if ($request->hasFile('image_left')) {
                if ($isUpdate && $product->image_left && file_exists(public_path($product->image_left))) {
                    unlink(public_path($product->image_left));
                }
                $leftImage = $request->file('image_left');
                $leftImageName = time() . '_left.' . $leftImage->getClientOriginalExtension();
                $leftImage->move(public_path('uploads/products'), $leftImageName);
                $validated['image_left'] = 'uploads/products/' . $leftImageName;
            }

            if ($request->hasFile('course_doc')) {
                if ($isUpdate && $product->course_doc && file_exists(public_path($product->course_doc))) {
                    unlink(public_path($product->course_doc));
                }
                $courseDoc = $request->file('course_doc');
                $docName = time() . '_doc.' . $courseDoc->getClientOriginalExtension();
                $courseDoc->move(public_path('uploads/courses'), $docName);
                $validated['course_doc'] = 'uploads/courses/' . $docName;
            }

            // Create or update the product
            if ($isUpdate) {
                $product->update($validated);
                $message = 'Product updated successfully!';
            } else {
                $product = Product::create($validated);
                $message = 'Product created successfully!';
            }

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => $message,
                    'product' => $product,
                    'redirect_url' => route('admin.products.index')
                ]);
            }

            return redirect()->route('admin.products.index')
                ->with('success', $message);

        } catch (\Throwable $th) {
            // Clean up any uploaded files if there's an error
            foreach(['image', 'image_back', 'image_left', 'course_doc'] as $field) {
                if (isset($validated[$field]) && file_exists(public_path($validated[$field]))) {
                    unlink(public_path($validated[$field]));
                }
            }

            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to ' . ($isUpdate ? 'update' : 'create') . ' product: ' . $th->getMessage()
                ], 500);
            }

            return back()->withInput()
                ->with('error', 'Failed to ' . ($isUpdate ? 'update' : 'create') . ' product: ' . $th->getMessage());
        }
    }

    public function getSubcategories($categoryId)
    {
        $subcategories = SubCategory::where('parent_id', $categoryId)
            ->whereNull('deleted_at') // Optional: skip soft-deleted
            ->where('status', 0)      // Optional: only active
            ->get();

        return response()->json([
            'subcategories' => $subcategories
        ]);
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $subcategories = SubCategory::where('parent_id', $product->category_id)->get();
        return view('admin.products.create', compact('product', 'categories', 'subcategories'));
    }
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('admin.products.show', compact('product'));
    }
    public function destroy(Request $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Product deleted successfully!',
                    'redirect_url' => route('admin.products.index')
                ]);
            }
            return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.products.index')->with('error', 'Failed to delete product: ' . $e->getMessage());
        }
    }
}
