<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $validatedData = $request->validate([

        ]);

        $user->id = $request->;
        $user->last_name = $request->;
        $user->first_name = $request->;
        $user->middle_name = $request->;
        $user->suffix = $request->;
        $user->address = $request->;
        $user->birthdate = $request->;
        $user->sex = $request->;
        $user->contact_number = $request->;
        $user->fourps = $request->;
        $user->arb = $request->;
        $user->pwd = $request->;
        $user->indigenous = $request->;
        $user->name_tribe = $request->;
        $user->email = $request->;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }

    public function update_user_profile(Request $request)
    {
        $id = $request->input('id');
        
        $user = User::findOrFail($id);
        
        $data = $request->only([
            'last_name', 'first_name', 'middle_name', 'suffix', 
            'address', 'birthdate', 'sex', 'contact_number', 'fourps', 
            'arb', 'indigenous', 'name_tribe', 'email'
        ]);
    
        if ($request->input('indigenous') === 'NO') {
            $data['name_tribe'] = 'N/A';
        }
    
        if ($request->has('password') && $request->input('password') !== '') {
            $data['password'] = bcrypt($request->input('password'));
        }
    
        $user->update($data);
        
        return redirect()->back()->with('success', 'Updated successfully.');
    }

}
