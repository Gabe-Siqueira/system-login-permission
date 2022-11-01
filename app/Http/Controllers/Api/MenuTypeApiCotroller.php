<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LibraryController;
use App\Models\MenuType;
use App\Models\Profile;
use Exception;
use Illuminate\Http\Request;

class MenuTypeApiCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {

        try {
            $menuType = new MenuType();
            $response = $menuType->get();

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
}
