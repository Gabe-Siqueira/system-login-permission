<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Api\MenuApiController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\Api\PermissionApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\UserMenuApiController;
use Exception;
use Illuminate\Http\Request;
use stdClass;

class PermissionAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $permissionController = PermissionApiController::index();
            $permission = $permissionController['data'];

            return view('permission.index', ['permission' => $permission]);
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
            $menuController = MenuApiController::index();
            $userController = UserApiController::indexProfile();

            $menu = $menuController['data'];
            $user = $userController['data'];

            $arrayUser = array();
            foreach ($user as $key => $value) {
                $arrayUser[$value->id_profile][$value->id] = $value->name;
            }

            return view('permission.create', ['menu' => $menu, 'user' => $arrayUser]);
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

            $menu = explode('_', $request->menu);

            $id_menu = $menu[0];
            $name = $menu[1];

            $request->request->add([
                'id_menu' => $id_menu,
                'name' => $name
            ]);

            $permissionController = PermissionApiController::store($request);
            $permission = $permissionController;

            $error = $permission['error'];

            if ($error) {
                $validator = $permission['data'];
                return back()
                            ->withErrors($validator)
                            ->withInput();
            }

            return redirect()
                            ->back()
                            ->withSuccess('Permissão cadastrado com sucesso!')
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
    public function edit($id_menu)
    {
        try {
            $permissionController = PermissionApiController::showWithIdMenu($id_menu);
            $menuController = MenuApiController::index();
            $userController = UserApiController::indexProfile();
            $userMenuController = UserMenuApiController::indexWithIdMenu($id_menu);

            $permission = $permissionController['data'];
            $menu = $menuController['data'];
            $user = $userController['data'];
            $userMenu = $userMenuController['data'];

            $returnPermission = new stdClass;
            foreach ($permission as $key => $value) {
                $returnPermission->id = $value->id;
                $returnPermission->id_menu = $value->id_menu;
                $returnPermission->name = $value->name;
            }

            $arrayUser = array();
            foreach ($user as $key => $value) {
                $arrayUser[$value->id_profile][$value->id] = $value->name;
            }

            $arrayUserMenu = array();
            foreach ($userMenu as $key => $value) {
                $arrayUserMenu[] = $value->id_user;
            }

            return view('permission.edit',['permission' => $returnPermission, 'menu' => $menu, 'user' => $arrayUser, 'userMenu' => $arrayUserMenu]);
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
            $menu = explode('_', $request->menu);

            $id_menu = $menu[0];
            $name = $menu[1];

            $request->request->add([
                'id_menu' => $id_menu,
                'name' => $name
            ]);

            $permissionController = PermissionApiController::update($request, $id);
            $permission = $permissionController;

            $error = $permission['error'];

            if ($error) {
                $validator = $permission['data'];
                return back()
                            ->withErrors($validator)
                            ->withInput();
            }

            return redirect()
                            ->back()
                            ->withSuccess('Permissão atualizado com sucesso!')
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
            PermissionApiController::destroy($id);
            return redirect()
                        ->back()
                        ->withSuccess('Permissão excluído com sucesso!')
                        ->withInput();
        } catch (Exception $e) {
            throw $e;
            return LibraryController::responseApi(["title" => __('messages.titleLoadPageError'), "message" => __('messages.defaultMessage')], "", 500, false);
        }
    }
}
