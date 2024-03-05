<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    //
   public function create()
   {
    return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming the field name is 'logo'
            // Add other validation rules for other fields if needed
        ]);

        // Upload the file
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/logos', $fileName); // Store the uploaded file in storage/app/public/logos directory
        }

        // Save client data to the database
        $client = new Client();
        $client->name = $request->name;
        // Set other fields as needed
        $client->logo = $fileName; // Save the file name to the 'logo' field
        $client->save();

        return redirect('/dashboard')->with('success', 'Client added successfully');
    }
}

