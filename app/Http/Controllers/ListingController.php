<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    
    public function index()
    {
        $listings = Listing::latest()->filter(request(['tag', 'search']))->paginate(8);
       
        return view('listings.index', compact('listings'));
    }

   
    public function create()
    {
        return view('listings.create');
    }

    
    public function store(Request $request)
    {
        $validatedListings = $request->validate([
            'title' => 'required',
            'company' => 'required|unique:listings,company',
            'location' => 'required',
            'website' => 'required',
            'email' => 'required|email',
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $validatedListings['logo'] = $request->file('logo')->store('logos');
        }

        $validatedListings['user_id'] = auth()->id();

        Listing::create($validatedListings);

        return to_route('listings.index')->with('message', 'LISTING CREATED SUCCESSFULLY');
    }

    
    public function show(Listing $listing)
    {
        return view('listings.show', compact('listing'));
    }

    
    public function edit(Listing $listing)
    {
        return view('listings.edit', compact("listing"));
    }

   
    public function update(Request $request, Listing $listing)
    {
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $validatedListings = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => 'required|email',
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $validatedListings['logo'] = $request->file('logo')->store('logos');
        }

        $listing->update($validatedListings);

        return to_route('listings.index')->with('update', 'LISTING UPDATED SUCCESSFULLY');
    }

    
    public function destroy(Listing $listing)
    {
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized');
        }
        
        if($listing->logo) {
            Storage::delete($listing->logo);
        }
        
        $listing->delete();
        return to_route('listings.index')->with('delete', 'LISTING DELETED SUCCESSFULLY');
    }

    public function manage() {
        $listings = Auth::user()->listings;
        return view('listings.manage', compact('listings'));
    }
}
