<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Admin\TokenController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LibraryController;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use \GuzzleHttp\Psr7\Request as RequestGuzzle;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autentication(Request $request)
    {

        Log::debug("autentication");

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $head = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
        $bodyRequest = $request->only(['email', 'password']);
        $body = json_encode($bodyRequest);

        $credentials = [];

        try {

            $credentials = ['email' => $request->email, 'password' => $request->password];

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                // return redirect()->intended('home');
                return redirect(route('home'));
            }else{
                // return back()->withErrors([
                //     'errors' => 'Usuário ou Senha incorreto!',
                // ]);

                // return back()
                //         ->withErrors(['message' => 'Email ou Senha incorreto!'])
                //         ->withInput();

                return redirect()->back()->with('errors', 'Email ou Senha incorreto!');
            }

        } catch (Exception $e) {
            Session::put('fail', 'Email ou senha incorreto');
            return view('auth.login', ['credential' => $credentials]);
        }
        $tokenController = new TokenController;
        $tokenController->setCredentials($credentials);
        $expires_in = Carbon::now()->addSeconds(($credentials['expires_in'] - env('SESSION_EXPIRE')))->format('Y-m-d H:i:s');
        Session::put('expires_in', $expires_in);
        Log::debug("PASSOU AQUI");
        return redirect(route('home.index'));
    }

    public static function logout()
    {
        $credentials = AuthController::logout();
        Session::forget('credentials');
        Session::forget('nameUser');
        Session::forget('last_activity');
        return redirect(route('login'));
    }

    public static function refresh()
    {
        $credentials = AuthController::refresh();
        Session::forget('credentials');
        Session::forget('nameUser');
        if (isset($credentials['error'])) {
            Session::put('fail', 'Email ou senha incorreto');
            return view('auth.login', ['credential' => $credentials]);
        }
        $expires_in = Carbon::now()->addSeconds(($credentials['expires_in'] - env('SESSION_EXPIRE')))->format('Y-m-d H:i:s');
        Session::put('credentials', $credentials);
        Session::put('expires_in', $expires_in);
    }
}
