<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Api\ProfileApiCotroller;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\Api\UserApiController;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $userController = UserApiController::index();
            $user = $userController['data'];

            return view('user.index', ['user' => $user]);
        } catch (Exception $e) {
            throw $e;
            return LibraryController::responseApi(["title" => __('messages.titleLoadPageError'), "message" => __('messages.defaultMessage')], "", 500, false);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $userAuth = Auth::user();
            $profileController = ProfileApiCotroller::index();
            $profile = $profileController['data'];

            return view('user.create', ['profile' => $profile, 'userAuth' => $userAuth]);
        } catch (Exception $e) {
            throw $e;
            return LibraryController::responseApi(["title" => __('messages.titleLoadPageError'), "message" => __('messages.defaultMessage')], "", 500, false);
        }
    }

    /**
     * Store a new blog post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        try {

            $userController = UserApiController::store($request);
            $user = $userController;

            $error = $user['error'];

            if ($error) {
                $validator = $user['data'];
                return back()
                            ->withErrors($validator)
                            ->withInput();
            }

            return redirect()
                            ->route('user.create')
                            ->withSuccess('Usuário cadastrado com sucesso!')
                            ->withInput();
        } catch (Exception $e) {
            throw $e;
            return LibraryController::responseApi(["title" => __('messages.titleLoadPageError'), "message" => __('messages.defaultMessage')], "", 500, false);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {

            $userAuth = Auth::user();
            $userService = UserApiController::show($id);
            $profileController = ProfileApiCotroller::index();

            $user = $userService['data'];
            $profile = $profileController['data'];

            $returnUser = new stdClass;
            foreach ($user as $key => $value) {
                $returnUser->id = $value->id;
                $returnUser->name = $value->name;
                $returnUser->email = $value->email;
                $returnUser->id_profile = $value->id_profile;
                $returnUser->password = $value->password;
            }

            return view('user.edit',['user' => $returnUser, 'userAuth' => $userAuth, 'profile' => $profile]);
        } catch (Exception $e) {
            throw $e;
            return LibraryController::responseApi(["title" => __('messages.titleLoadPageError'), "message" => __('messages.defaultMessage')], "", 500, false);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $userController = UserApiController::update($request, $id);
            $user = $userController;

            $error = $user['error'];

            if ($error) {
                $validator = $user['data'];
                return back()
                            ->withErrors($validator)
                            ->withInput();
            }

            return redirect()
                            ->route('user.index')
                            ->withSuccess('Usuário atualizado com sucesso!')
                            ->withInput();
        } catch (Exception $e) {
            throw $e;
            return LibraryController::responseApi(["title" => __('messages.titleLoadPageError'), "message" => __('messages.defaultMessage')], "", 500, false);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            UserApiController::destroy($id);
            return redirect()
                        ->route('user.index')
                        ->withSuccess('Usuário excluído com sucesso!')
                        ->withInput();
        } catch (Exception $e) {
            throw $e;
            return LibraryController::responseApi(["title" => __('messages.titleLoadPageError'), "message" => __('messages.defaultMessage')], "", 500, false);
        }
    }
}
