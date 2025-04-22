<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
class BlogController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $blogs = Blog::all();
    return view('admin.blog.index', compact('blogs'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {

    return view('admin.blog.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // Debug the incoming request data
    \Log::info('Request Data:', $request->all());
    
    $request->validate([
      'title' => 'required',
      'content' => 'required',
      'author' => 'required', 
      'slug' => 'required',
      'datePublished' => 'required',
    ]);
    
    try {
        // Debug the data before creation/update
        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'slug' => $request->slug,
            'published_at' => $request->datePublished,
            'status' => $request->status ?? '0', // Use provided status or default to 0
        ];
        \Log::info('Data to be saved:', $data);
        
        // Check if we're updating an existing blog
        if ($request->has('blog_id')) {
            $blog = Blog::findOrFail($request->blog_id);
            $blog->update($data);
            $message = 'Blog updated successfully';
        } else {
            $blog = Blog::create($data);
            $message = 'Blog created successfully';
        }
        
        \Log::info('Blog saved successfully:', ['id' => $blog->id]);
        
        if ($request->ajax()) {
          return response()->json([
            'success' => true,
            'message' => $message,
            'redirect_url' => route('admin.blog.index')
          ]);
        }
        return redirect()->route('admin.blog.index')->with('success', $message);
    } catch (\Exception $e) {
        \Log::error('Error saving blog: ' . $e->getMessage());
        \Log::error('Stack trace: ' . $e->getTraceAsString());
        
        if ($request->ajax()) {
          return response()->json([
            'success' => false,
            'message' => $e->getMessage()
          ], 500);
        }
        return back()->with('error', 'Error saving blog: ' . $e->getMessage());
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $blog = Blog::findOrFail($id);
    return view('admin.blog.create', compact('blog'));
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
  public function destroy(Request $request, $id)
  {
      try {
          $blog = Blog::findOrFail($id);
          $blog->delete();
          
          if ($request->ajax()) {
              return response()->json([
                  'success' => true,
                  'message' => 'Blog deleted successfully!',
                  'redirect_url' => route('admin.blog.index')
              ]);
          }
          return redirect()->route('admin.blog.index')->with('success', 'Blog deleted successfully!');
      } catch (\Exception $e) {
          if ($request->ajax()) {
              return response()->json([
                  'success' => false,
                  'message' => 'Failed to delete blog: ' . $e->getMessage()
              ], 500);
          }
          return redirect()->route('admin.blog.index')->with('error', 'Failed to delete blog: ' . $e->getMessage());
      }
  }
}
