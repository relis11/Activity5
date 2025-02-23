<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * Show login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Process login request.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            Log::info("User logged in: " . Auth::user()->email);
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    /**
     * Logout the user.
     */
    public function logout(Request $request)
    {
        if (Auth::check()) {
            Log::info("User logged out: " . Auth::user()->email);
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return redirect()->route('login');
    }

    /**
     * Show registration form.
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Process registration.
     */
    public function processRegister(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);
        Log::info("New user registered: " . $user->email);

        return redirect()->route('dashboard')->with('success', 'Registration successful!');
    }

    /**
     * Redirect to Google login.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google login callback.
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $email = $googleUser->getEmail() ?? 'user_' . uniqid() . '@example.com'; // Ensure a valid email

            $user = User::updateOrCreate(
                ['email' => $email],
                [
                    'name' => $googleUser->getName(),
                    'auth_provider' => 'google',
                    'auth_provider_id' => $googleUser->getId(),
                    'password' => Hash::make(uniqid()), // Generate a default password
                ]
            );

            Auth::login($user);
            Log::info("User logged in via Google: " . $user->email);

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            Log::error("Google login failed: " . $e->getMessage());
            return redirect()->route('login')->withErrors(['google' => 'Failed to login with Google.']);
        }
    }

    /**
     * Redirect to Facebook login.
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Handle Facebook login callback.
     */
    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();
            $email = $facebookUser->getEmail() ?? 'user_' . uniqid() . '@example.com'; // Ensure a valid email

            $user = User::updateOrCreate(
                ['email' => $email],
                [
                    'name' => $facebookUser->getName(),
                    'auth_provider' => 'facebook',
                    'auth_provider_id' => $facebookUser->getId(),
                    'password' => Hash::make(uniqid()), // Generate a default password
                ]
            );

            Auth::login($user);
            Log::info("User logged in via Facebook: " . $user->email);

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            Log::error("Facebook login failed: " . $e->getMessage());
            return redirect()->route('login')->withErrors(['facebook' => 'Failed to login with Facebook.']);
        }
    }
}