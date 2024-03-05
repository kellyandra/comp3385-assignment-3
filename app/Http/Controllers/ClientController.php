<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;


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
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'telephone' => 'required|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/',
            'address' => 'required|string|max:255',
            'company_logo' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Image must be less than 2MB
        ]);

        $fileName = null; // Initialize $fileName to handle cases where no file is uploaded
        
        // Upload the file
        if ($request->hasFile('company_logo')) {
            $image = $request->file('company_logo');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/logos', $fileName); // Store the uploaded file
            $filePath  = 'logos/' . $fileName;

        }

        // Save client data to the database
        $client = new Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->telephone = $request->telephone;
        $client->address = $request->address;
        
        if ($filePath) {
            $client->company_logo = $filePath; // Save the file name to the 'logo' field
        }
        $client->save();

        return redirect()->route('dashboard')->with('success', 'Client added successfully');
    }
}