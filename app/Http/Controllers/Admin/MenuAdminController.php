<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\Api\MenuApiController;
use Exception;
use Illuminate\Http\Request;
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
            return view('menu.create');
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

            $menuService = MenuApiController::show($id);

            $menu = $menuService['data'];

            $returnMenu = new stdClass;
            foreach ($menu as $key => $value) {
                $returnMenu->id = $value->id;
                $returnMenu->name = $value->name;
                $returnMenu->email = $value->email;
            }

            return view('menu.edit',['user' => $returnMenu]);
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
