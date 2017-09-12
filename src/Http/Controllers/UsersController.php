<?php

namespace RafflesArgentina\UserRoleAndPermission\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use RafflesArgentina\ResourceController\ResourceController;

use RafflesArgentina\UserRoleAndPermission\Http\Requests\UserRequest;
use RafflesArgentina\UserRoleAndPermission\Repositories\UserRepository;

use RafflesArgentina\UserRoleAndPermission\Http\Middleware\ActionBasedPermissions;

class UsersController extends ResourceController
{
    public function __construct()
    {
        $this->module = config('user-role-and-permission.module');

        $this->repository = config('user-role-and-permission.repository') ?: UserRepository::class;

        $this->formRequest = config('user-role-and-permission.form_request') ?: UserRequest::class;

        $this->resourceName = config('user-role-and-permission.resource_name') ?: 'users';

        parent::__construct();

        $this->middleware('auth');
        $this->middleware(ActionBasedPermissions::class);
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
