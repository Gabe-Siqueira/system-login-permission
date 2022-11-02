<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LibraryController;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserApiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        try {
            $auth = Auth::user();
            $user = new User();
            if ($auth->id_profile != 1) {
                $user = $user->whereNotIn('id_profile', [1]);
            }
            $response = $user->get();

            return LibraryController::responseApi($response);
        } catch (Exception $e) {
            LibraryController::recordError($e);
            if ($e->getCode()) {
                $code = $e->getCode();
            }else {
                $code = 500;
            }
            return response()->json(LibraryController::responseApi([],$e->getMessage(), $code, false));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function indexProfile()
    {
        try {
            $auth = Auth::user();
            $user = new User();
            if ($auth->id_profile != 1) {
                $user = $user->whereNotIn('id_profile', [1]);
            }
            $user = $user->join('profile', 'users.id_profile', '=', 'profile.id');
            $user = $user->select('users.id AS id', 'profile.name AS id_profile', 'users.name AS name');
            $user = $user->orderBy('users.id_profile');
            $response = $user->get();

            return LibraryController::responseApi($response);
        } catch (Exception $e) {
            LibraryController::recordError($e);
            if ($e->getCode()) {
                $code = $e->getCode();
            }else {
                $code = 500;
            }
            return response()->json(LibraryController::responseApi([],$e->getMessage(), $code, false));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id_profile' => 'required|integer',
                'name' => 'required|max:255',
                'email' => 'required|unique:users|max:255',
                'password' => 'required|max:255'
            ], [
                'email.unique' => 'Email "'.$request->email.'" já está em uso.',
            ], [
                'id_profile'      => 'Perfil',
                'name'      => 'Usuário',
                'email'      => 'Email',
                'password'      => 'Senha',
            ]);

            if ($validator->fails()) {
                return LibraryController::responseApi($validator, $validator->getMessageBag(), true, false);
            }

            $user = new User();
            $user->fill($request->all());
            $user->password = bcrypt($request->password);
            $user->save();
            return LibraryController::responseApi($user);
        } catch (Exception $e) {
            LibraryController::recordError($e);
            if ($e->getCode()) {
                $code = $e->getCode();
            }else {
                $code = 500;
            }
            return response()->json(LibraryController::responseApi([],$e->getMessage(), $code, false));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function show($id)
    {
        try {
            $user = new User();
            $user = $user::findOrFail($id);
            $response = $user->where('id', $id)->get();
            return LibraryController::responseApi($response);
        } catch (Exception $e) {
            LibraryController::recordError($e);
            if ($e->getCode()) {
                $code = $e->getCode();
            }else {
                $code = 500;
            }
            return response()->json(LibraryController::responseApi([],$e->getMessage(), $code, false));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function update(Request $request, $id)
    {
        try {

            if (is_null($request->password)) {
                $request->request->add(['password' => $request->confirm_password]);
            }

            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'email' => 'required|max:255|unique:users,email,'.$id,
                'password' => 'max:255',
                'id_profile' => 'required'
            ], [
                'email.unique' => 'Email "'.$request->email.'" já está em uso.',
            ], [
                'name'      => 'Usuário',
                'email'      => 'Email',
                'password'      => 'Senha',
                'id_profile' => 'Profile'
            ]);

            if ($validator->fails()) {
                return LibraryController::responseApi($validator, $validator->getMessageBag(), true, false);
            }

            $user = new User();
            $user = $user->findOrFail($id);
            $user->fill($request->all());
            LibraryController::logupdate($user);
            $user->save();
            return LibraryController::responseApi($user, 'ok', false, true);
        } catch (Exception $e) {
            LibraryController::recordError($e);
            if ($e->getCode()) {
                $code = $e->getCode();
            }else {
                $code = 500;
            }
            return response()->json(LibraryController::responseApi([],$e->getMessage(), $code, false));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function destroy($id)
    {
        try {
            $user = new User();
            $user = $user->findOrFail($id);
            $user->delete();
            return LibraryController::responseApi($user, 'ok');
        } catch (Exception $e) {
            LibraryController::recordError($e);
            if ($e->getCode()) {
                $code = $e->getCode();
            }else {
                $code = 500;
            }
            return response()->json(LibraryController::responseApi([],$e->getMessage(), $code, false));
        }

    }
}
