<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Review;
use App\Models\User;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this-> middleware('auth', ['except' => ['index', 'logout']]);
        $this-> middleware('verified', ['except' => ['index', 'profile', 'logout', 'destroy']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reviews = Review::orderBy('created_at', 'desc')->take(5)->get();
        return view('main.home', ['reviews' => $reviews]);
    }
    
    
    public function profile()
    {
        
        return view('main.profile',  ['user' => Auth::user()]);
    }
    
    public function post()
    {
        $reviews = Review::orderBy('created_at', 'desc')->get();
        $type = null;
         return view('reviews.index', ['reviews' => $reviews, 'type' => $type]);
        
    }
    public function logout()
    {
        Auth::logout();
        $message = 'You have logged out';
        return redirect('/')->with('message', $message);
        
    }
    
    public function films()
    {
        $reviews = Review::where('type', 'films')->orderBy('created_at', 'desc')->get();
        $type = 'Films';
        return view('reviews.index', ['reviews' => $reviews, 'type' => $type]);
    }
    
    public function records()
    {
        
        $reviews = Review::where('type', 'record')->orderBy('created_at', 'desc')->get();
        $type = 'Records';
        return view('reviews.index', ['reviews' => $reviews, 'type' => $type]);
    }
    
    
    public function books()
    {
        
        $reviews = Review::where('type', 'book')->orderBy('created_at', 'desc')->get();
        $type = 'Books';
        return view('reviews.index', ['reviews' => $reviews, 'type' => $type]);
    }
    
    public function update(Request $request, User $user)
    {
        try{
            if($user->id == Auth::user()->id){
                $user->update($request->all());
                $message = 'The user ' . $user->name . ' has been updated';
            }else{
                $message = 'The user ' . $user->name . ' could not be updated';
                return redirect('/profile');
            }
        }catch(Exception $e) {
            return back()
                    ->withInput()
                    ->withErrors(['update' => 'An unexpected error occurred while updating user.']);
        }
                return redirect('/profile')->with('message', $message);
    }
    public function destroy(User $user)
    {
        try {
            if($user->id == Auth::user()->id){
                foreach($user->reviews as $review){
                    $images = Image::where('idreview', $review->id)->get();
                    foreach($images as $image){
                        Storage::disk('local')->delete('public/images/'. $image->name);
                    };
                };
                $user->delete();
                Auth::logout();
                 $message = 'The user ' . $user->name . ' has been removed with all the consequences';
            }else{
                $message = 'The user could not be deleted ';
                return redirect('/profile')->with('message', $message);
            }
        } catch(\Exception $e) {
            return back()
                    ->withInput()
                    ->withErrors(['update' => 'An unexpected error occurred while deleting user.']);
        }
        return redirect('/')->with('message', $message);
    }
    
    
    
    
    
    
}
