<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LibraryController;
use App\Models\Permission;
use App\Models\UserMenu;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermissionApiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {

        try {
            $permission = new Permission();
            $response = $permission->get();

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
                'name' => 'required|unique:permission|max:255',
                'id_menu' => 'required',
                'user' => 'required',
            ], [
                'name.unique' => 'Permissão "'.$request->name.'" já está em uso.',
            ], [
                'name'      => 'Permissão',
                'id_menu'      => 'Menu',
                'user'      => 'Usuário',
            ]);

            if ($validator->fails()) {
                return LibraryController::responseApi($validator, $validator->getMessageBag(), true, false);
            }

            $id_menu = $request->id_menu;
            $user = $request->user;

            $userMenu = new UserMenu();

            foreach ($user as $key => $value) {
                $userMenu->create([
                    'id_menu' => $id_menu,
                    'id_user' => $value
                ]);
            }

            $permission = new Permission();
            $permission->fill($request->all());
            $permission->save();
            return LibraryController::responseApi($permission, 'ok');
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
            $permission = new Permission();
            $permission = $permission::findOrFail($id);
            $response = $permission->where('id', $id)->get();
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function showWithIdMenu($id)
    {
        try {
            $permission = new Permission();
            $permission = $permission->where('id_menu', $id);
            $response = $permission->get();
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
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255|unique:permission,name,'.$id,
                'id_menu' => 'required',
                'user' => 'required',
            ], [
                'name.unique' => 'Permissão "'.$request->name.'" já está em uso.',
            ], [
                'name'      => 'Permissão',
                'id_menu'      => 'Menu',
                'user'      => 'Usuário',
            ]);

            if ($validator->fails()) {
                return LibraryController::responseApi($validator, $validator->getMessageBag(), true, false);
            }

            $id_menu_actual = $request->id_menu_actual;
            $id_menu = $request->id_menu;
            $user = $request->user;

            UserMenuApiController::destroyWithIdMenu($id_menu);

            $userMenu = new UserMenu();

            foreach ($user as $key => $value) {
                $userMenu->create([
                    'id_menu' => $id_menu,
                    'id_user' => $value
                ]);
            }

            // $permission = $this->permission;
            $permission = new Permission();
            $permission = $permission->findOrFail($id);
            $permission->fill($request->all());
            LibraryController::logupdate($permission);
            $permission->save();
            return LibraryController::responseApi($permission, 'ok');
            // return response()->json(LibraryController::responseApi($permission, 'ok'));
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
            UserMenuApiController::destroyWithIdMenu($id);
            $permission = new Permission();
            $permission = $permission->where('id_menu', $id);
            $permission->delete();
            return LibraryController::responseApi($permission, 'ok');
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
