<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\organizer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class authController extends Controller
{
    public function store(Request $request)
    {
        // user validation
        $userData = $request->validate(
            [
                'first_name' => ['required', 'min:3', 'max:16'],
                'last_name' => ['required', 'min:3', 'max:16'],
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => ['required', 'min:3', 'max:16', 'same:cpassword'],
                'cpassword' => ['required', 'min:3', 'max:16', 'same:password'],
                'phone' => ['required', 'min:9', 'max:16'],
                'profile' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
                'role' => ['required', 'in:organizer,client'],
            ],

            [

                'first_name.required' => 'First name is required.',
                'first_name.min' => 'The First name must have more than 3 characters.',
                'first_name.max' => 'The First name must have less than 16 characters.',
                'last_name.required' => 'Name is required.',
                'last_name.min' => 'The name must have more than 3 characters.',
                'last_name.max' => 'The name must have less than 16 characters.',
                'email.required' => 'The email is required.',
                'email.email' => 'Incorrect email structure.',
                'email.unique' => 'This email is already taken.',
                'password.min' => 'The password must have more than 3 characters.',
                'password.max' => 'The password must have less than 16 characters.',
                'password.required' => 'The password is required.',
                'cpassword.min' => 'The password must have more than 3 characters.',
                'cpassword.max' => 'The password must have less than 16 characters.',
                'cpassword.required' => 'The password is required.',
                'phone.required' => 'phone is required.',
                'phone.min' => 'The phone must have more than 9 characters.',
                'phone.max' => 'The phone must have less than 16 characters.',
                'profile.required' => 'The image is required.',
                'profile.image' => 'The file must be an image.',
                'profile.mimes' => 'The image must be of type: jpeg, png, jpg, gif, or webp.',
                'profile.max' => 'The image must not be larger than 2048 kilobytes.',
                'role.*' => 'Required or invalid Data please check again .',
            ]
        );




        if ($userData['password'] !== $userData['cpassword']) {
            return redirect()->back()->with('error', 'Password and confirmation password do not match.');
        }

        $userData['password'] = bcrypt($userData['password']);

        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $pictureName = time() . '.' . $file->extension();
            $file->storeAs('public/image', $pictureName);
            $userData['profile'] = $pictureName;
        }

        // Create user

        $user = User::create($userData);


        // Assign user_id create client

        if ($userData['role'] == 'client') {


            client::create([
                'user_id' => $user->id,
            ]);
            auth()->login($user);

            return redirect('/client');
        } else if ($userData['role'] == 'organizer') {
            // Assign user_id create organizer


            organizer::create([
                'user_id' => $user->id,
            ]);
            auth()->login($user);

            return redirect('/organizer');
        }
    }


    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
            'rememberMe' => 'boolean', 
        ], [
            'email.required' => 'Email is required for login',
            'password.required' => 'Password is required for login'
        ]);
    
        $rememberMe = $request->has('rememberMe') && $request->input('rememberMe');
    
        if (auth()->attempt(['email' => $data['email'], 'password' => $data['password']], $rememberMe)) {
            $authenticatedUser = auth()->user();
    
            if ($authenticatedUser->organizer) {
                return redirect('/organizer');
            }
    
            if ($authenticatedUser->client) {
                return redirect('/client');
            }
    
            if ($authenticatedUser->admin) {
                return redirect('/admin');
            }
        } else {
            return redirect('/')
                ->withErrors(['login' => 'Invalid credentials'])
                ->withInput();
        }
    }
    

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
