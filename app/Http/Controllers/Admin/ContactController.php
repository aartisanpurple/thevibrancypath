<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%");
            });
        }
        $contacts = $query->orderBy('id', 'desc')->paginate(10);
        return view('admin.contact.index', compact('contacts'));
    }
    public function store(Request $request)
    {
        $isUpdate = $request->has('id');
        // Validate the form input
        $validationRules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'contact' => 'required|string|max:255',
            'message' => 'required|string',
            'subject' => 'required|string|max:255',
        ];

        $request->validate($validationRules);
        try {
            if (isset($request->id)) {
                $contact = Contact::find($request->id);
                $contact->update($request->all());  
                $message = 'Contact updated successfully!';
            }else{
                // Create the contact
                $contact = Contact::create($request->all());
                $message = 'Contact added successfully!';
            }
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'contact' => $contact,
                    'message' => $message,
                    'redirect_url' => route('admin.contact.index') // Pass the URL
                ]);
            }
            // Redirect back with a success message
            return redirect()->route('admin.contact.index')->with('success', $message);
        } catch (\Exception $e) {
            return redirect()->route('admin.contact.index')->with('error', 'Failed to add contact: ' . $e->getMessage());
        }
    }
    public function destroy(Request $request, $id)
    {
        try {
            $contact = Contact::find($id);
            $contact->delete();
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Contact deleted successfully!',
                    'redirect_url' => route('admin.contact.index')
                ]);
            }
        return redirect()->route('admin.contact.index')->with('success', 'Contact deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.contact.index')->with('error', 'Failed to delete contact: ' . $e->getMessage());
        }
    }
}
