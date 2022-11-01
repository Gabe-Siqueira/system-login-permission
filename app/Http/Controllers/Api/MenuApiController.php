<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LibraryController;
use App\Models\Menu;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuApiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {

        try {
            // $menu = $this->menu;
            $menu = new Menu();
            $response = $menu->get();

            return LibraryController::responseApi($response);
            // return response()->json(LibraryController::responseApi($response));
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
                'id_menu_type' => 'required',
                'name' => 'required|unique:menu',
                'link' => 'max:255',
                'icon' => 'max:255',
                'order' => 'required'
            ], [
                'name.unique' => 'Menu "'.$request->name.'" já está em uso.',
            ], [
                'id_menu_type' => 'Tipo Menu',
                'name'      => 'Menu',
                'link'      => 'Link',
                'icon'      => 'Icone',
                'order'          => 'Ordem'
            ]);

            if ($validator->fails()) {
                return LibraryController::responseApi($validator, $validator->getMessageBag(), true, false);
            }

            // $menu = $this->menu;
            $menu = new Menu();
            $menu->fill($request->all());
            $menu->save();
            return LibraryController::responseApi($menu, 'ok');
            // return response()->json(LibraryController::responseApi($menu, 'ok'));
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
            // $menu = $this->menu;
            $menu = new Menu();
            $menu = $menu::findOrFail($id);
            $response = $menu->where('id', $id)->get();
            return LibraryController::responseApi($response);
            // return response()->json(LibraryController::responseApi($response));
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
                'id_menu_type' => 'required',
                'name' => 'required|max:255|unique:menu,name,'.$id,
                'link' => 'max:255',
                'icon' => 'max:255',
                'order' => 'required'
            ], [
                'name.unique' => 'Menu "'.$request->name.'" já está em uso.',
            ], [
                'id_menu_type' => 'Tipo',
                'name'      => 'Menu',
                'link'      => 'Link',
                'icon'      => 'Icone',
                'order'          => 'Ordem'
            ]);

            if ($validator->fails()) {
                return LibraryController::responseApi($validator, $validator->getMessageBag(), true, false);
            }

            // $menu = $this->menu;
            $menu = new Menu();
            $menu = $menu->findOrFail($id);
            $menu->fill($request->all());
            LibraryController::logupdate($menu);
            $menu->save();
            return LibraryController::responseApi($menu, 'ok');
            // return response()->json(LibraryController::responseApi($menu, 'ok'));
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
            // $menu = $this->menu;
            $menu = new Menu();
            $menu = $menu->findOrFail($id);
            $menu->delete();
            return LibraryController::responseApi($menu, 'ok');
            // return response()->json(LibraryController::responseApi($menu, 'ok'));
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
