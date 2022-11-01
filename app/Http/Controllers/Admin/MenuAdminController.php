<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\Api\MenuApiController;
use App\Http\Controllers\Api\MenuTypeApiCotroller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class MenuAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $menuController = MenuApiController::index();
            $menu = $menuController['data'];

            return view('menu.index', ['menu' => $menu]);
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
            $menuTypeController = MenuTypeApiCotroller::index();
            $menuType = $menuTypeController['data'];

            return view('menu.create', ['menuType' => $menuType]);
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

            $menuController = MenuApiController::store($request);
            $menu = $menuController;

            $error = $menu['error'];

            if ($error) {
                $validator = $menu['data'];
                return back()
                            ->withErrors($validator)
                            ->withInput();
            }

            return redirect()
                            ->route('menu.create')
                            ->withSuccess('Menu cadastrado com sucesso!')
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
            $menuService = MenuApiController::show($id);
            $menuTypeController = MenuTypeApiCotroller::index();

            $menu = $menuService['data'];
            $menuType = $menuTypeController['data'];

            $returnMenu = new stdClass;
            foreach ($menu as $key => $value) {
                $returnMenu->id = $value->id;
                $returnMenu->name = $value->name;
                $returnMenu->link = $value->link;
                $returnMenu->icon = $value->icon;
                $returnMenu->order = $value->order;
                $returnMenu->id_menu_type = $value->id_menu_type;
            }

            return view('menu.edit',['menu' => $returnMenu, 'menuType' => $menuType]);
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
            $menuController = MenuApiController::update($request, $id);
            $menu = $menuController;

            $error = $menu['error'];

            if ($error) {
                $validator = $menu['data'];
                return back()
                            ->withErrors($validator)
                            ->withInput();
            }

            return redirect()
                            ->route('menu.index')
                            ->withSuccess('Menu atualizado com sucesso!')
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
            MenuApiController::destroy($id);
            return redirect()
                        ->route('menu.index')
                        ->withSuccess('Menu excluído com sucesso!')
                        ->withInput();
        } catch (Exception $e) {
            throw $e;
            return LibraryController::responseApi(["title" => __('messages.titleLoadPageError'), "message" => __('messages.defaultMessage')], "", 500, false);
        }
    }
}
