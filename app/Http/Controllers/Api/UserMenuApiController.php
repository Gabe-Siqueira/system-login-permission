<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LibraryController;
use App\Models\UserMenu;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMenuApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function indexWithIdMenu($id_menu)
    {
        try {
            $userMenu = new UserMenu();
            $userMenu = $userMenu->where('id_menu', $id_menu);
            $response = $userMenu->get();

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function destroyWithIdMenu($id_menu)
    {
        try {
            $userMenu = new UserMenu();
            $userMenu = $userMenu->where('id_menu', $id_menu);
            $userMenu->delete();
            return LibraryController::responseApi($userMenu, 'ok');
        } catch (Exception $e) {
            if ($e->getCode()) {
                $code = $e->getCode();
            }else {
                $code = 500;
            }
            return LibraryController::responseApi([],$e->getMessage(), $code, false);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function destroyWithIdUser($id_user)
    {
        try {
            $userMenu = new UserMenu();
            $userMenu = $userMenu->where('id_user', $id_user);
            $userMenu->delete();
            return LibraryController::responseApi($userMenu, 'ok');
        } catch (Exception $e) {
            if ($e->getCode()) {
                $code = $e->getCode();
            }else {
                $code = 500;
            }
            return LibraryController::responseApi([],$e->getMessage(), $code, false);
        }

    }
}
