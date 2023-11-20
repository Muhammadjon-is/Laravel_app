<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // show all listing
    // show all listing
    public function index()
    {
        return view('listings.index', [
            'heading' => "Latest Listings",
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }

    // show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // show create form
    public function create()
    {
        return view('listings.create');
    }


   
  // Store Listing Data 
public function store(Request $request)
{
    $formFields = $request->validate([
        'title' => 'required',
        'company' => ['required', Rule::unique('listings', 'company')],
        'location' => 'required',
        'website' => 'required',
        'email' => ['required', 'email'],
        'tags' => 'required',
        'description' => 'required'
    ]);

    // Assuming you have user authentication and the user is logged in
    if($request->hasFile('log')) {
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
    }
    $formFields['user_id'] = auth()->id();
    Listing::create($formFields);


    return redirect('/')->with('message', 'Listing created successfully!');
}

// show edit form
public function edit(Listing $listing) {
    return view('listings.edit', ['listing' => $listing]);
}


// Update listing data
public function update(Request $request, Listing $listing)
{
// make sure logged in user is owner 
if($listing->user_id != auth()->id()) {
    abort(403, 'unauthorized Action');
}

    $formFields = $request->validate([
        'title' => 'required',
        'company' => 'required',
        'location' => 'required',
        'website' => 'required',
        'email' => ['required', 'email'],
        'tags' => 'required',
        'description' => 'required'
    ]);

    if($request->hasFile('logo')) {
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
    }

    $listing->update($formFields);

    return redirect('/listings/' . $listing->id)->with('message', 'Listing updated successfully!');
}


// Delete listing 
public function destroy(Listing $listing) {
// make sure logged in user is owner 
if($listing->user_id != auth()->id()) {
    abort(403, 'unauthorized Action');
}

  $listing->delete();
  return redirect('/')->with('message', "Listing Deleted Successfully");
}

   // Manage Listings
   public function manage() {
    return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
}

}
