<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('profile.index');
    }

    public function store(Request $request){

        $request->request->add(['username' => Str::slug($request->username)]);
        
        $this->validate($request, [
            'username' => ['required', 'unique:users,username,'.auth()->user()->id, 'min:3', 'max:24', 'not_in:twitter,youtube,facebook,edit-profile'],
            'email' => ['required', 'unique:users,email,'.auth()->user()->id, 'email', 'max:60'],
        ]);

        if (!Hash::check($request->password, auth()->user()->password)) {
            
            return back()->with('message-profile', 'Incorrect credentials.');

        }else{

            $user = User::find(auth()->user()->id);

            if($request->img_profile) {
                $image = $request->file('img_profile');
    
                $imageName = Str::uuid() . '.' .$image->extension();
    
                $serverImage = Image::make($image);
                $serverImage->fit(1000, 1000);
    
                $imagePath = public_path('profiles') . '/' . $imageName;
                $serverImage->save($imagePath);
            }
    
            $user->username = $request->username;
            $user->email = $request->email ?? auth()->user()->email;
            $user->img_profile = $imageName ?? auth()->user()->img_profile ?? null;
            $user->save();

        }

        //Redirect
        return redirect()->route('posts.index', $user->username);
    }
}
