<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\Api\PermissionApiController;
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
            return view('permission.create');
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
                            ->route('permission.create')
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
    public function edit($id)
    {
        try {

            $permissionService = PermissionApiController::show($id);

            $permission = $permissionService['data'];

            $returnPermission = new stdClass;
            foreach ($permission as $key => $value) {
                $returnPermission->id = $value->id;
                $returnPermission->name = $value->name;
            }

            return view('permission.edit',['permission' => $returnPermission]);
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
                            ->route('permission.index')
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
                        ->route('permission.index')
                        ->withSuccess('Permissão excluído com sucesso!')
                        ->withInput();
        } catch (Exception $e) {
            throw $e;
            return LibraryController::responseApi(["title" => __('messages.titleLoadPageError'), "message" => __('messages.defaultMessage')], "", 500, false);
        }
    }
}
