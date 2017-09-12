<?php

namespace RafflesArgentina\UserRoleAndPermission\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use RafflesArgentina\ResourceController\ResourceController;

use RafflesArgentina\UserRoleAndPermission\Http\Requests\PermissionRequest;
use RafflesArgentina\UserRoleAndPermission\Repositories\PermissionRepository;

class PermissionsController extends ResourceController
{
    public function __construct()
    {
        $this->module = config('user-role-and-permission.module');

        $this->repository = config('user-role-and-permission.permission_repository') ?: PermissionRepository::class;

        $this->formRequest = config('user-role-and-permission.permission_request') ?: PermissionRequest::class;

        $this->resourceName = config('user-role-and-permission.permission_resource_name') ?: 'permissions';

        parent::__construct();

        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $validator = $this->validateRules();

        if ($validator->fails()) {
            return $this->redirectBackWithErrors($validator);
        }

        $items = $this->repository->filter()->sorter()->paginate();

        if ($request->wantsJson()) {
            return response()->json($items->toJson(), 200, [], JSON_PRETTY_PRINT);
        } else {
            $view = $this->getViewLocation(__FUNCTION__);
            if (!View::exists($view)) {
                return $this->redirectBackWithViewMissingMessage($view);
            } else {
                return response()->view($view, compact('items'), 200);
            }
        }
    }
}
