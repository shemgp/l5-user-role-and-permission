<?php

namespace RafflesArgentina\UserRoleAndPermission\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\View;

use RafflesArgentina\FilterableSortable\QueryFilters;
use RafflesArgentina\FilterableSortable\QuerySorters;
use RafflesArgentina\ResourceController\ResourceController;
use RafflesArgentina\ResourceController\Exceptions\ResourceControllerException;

use RafflesArgentina\UserRoleAndPermission\Http\Requests\RoleRequest;
use RafflesArgentina\UserRoleAndPermission\Repositories\RoleRepository;

use RafflesArgentina\UserRoleAndPermission\Http\Middleware\ActionBasedPermissions;

class RolesController extends ResourceController
{
    public function __construct()
    {
        $this->alias = config('user-role-and-permission.alias');

        $this->module = config('user-role-and-permission.module');

        $this->prefix = config('user-role-and-permission.prefix');

        $this->repository = config('user-role-and-permission.role_repository') ?: RoleRepository::class;

        $this->formRequest = config('user-role-and-permission.role_form_request') ?: RoleRequest::class;

        $this->resourceName = config('user-role-and-permission.role_resource_name') ?: 'roles';

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

        $items = $this->repository->paginate();        

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

    public function store(Request $request)
    {
        $validator = $this->validateRules();

        if ($validator->fails()) {
            return $this->redirectBackWithErrors($validator);
        }

        try {
            $instance = $this->repository->create($request->all());
            $instance[1]->syncPermissions(array_keys($request->permissions));
        } catch (\Exception $e) {
            if (Lang::has('resource-controller.store-exception')) {
                $message = trans('resource-controller.store-exception');
            } else {
                $message = 'Operation failed while creating a new record.';
            }
            throw new ResourceControllerException($message, $e->getCode(), $e);
        }

        if (Lang::has('resource-controller.store-success')) {
            $message = trans(
                'resource-controller.store-success', [
                    'number' => $instance[1]->id
                ]
            );
        } else {
            $message = 'Newly created record number: '.$instance[1]->id;
        }

        if ($request->wantsJson()) {
            return response()->json($message, 200, [], JSON_PRETTY_PRINT);
        } else {
            return redirect()->route($this->getRouteName('index'))
                             ->with('rafflesargentina.resource_controller.success', $message);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = $this->validateRules();

        if ($validator->fails()) {
            return $this->redirectBackWithErrors($validator);
        }

        $model = $this->repository->findBy($this->repository->model->getRouteKeyName(), $id);

        try {
            $instance = $this->repository->update($model, $request->all());
            $instance[1]->syncPermissions(array_keys(array_filter($request->permissions)));
        } catch (\Exception $e) {
            if (Lang::has('resource-controller.update-exception')) {
                $message = trans('resource-controller.update-exception');
            } else {
                $message = 'Operation failed while updating the record.';
            }
            throw new ResourceControllerException($message, $e->getCode(), $e);
        }

        if (Lang::has('resource-controller.update-success')) {
            $message = trans(
                'resource-controller.update-success', [
                    'number' => $instance[1]->id
                ]
            );
        } else {
            $message = 'Register successfully updated: '.$instance[1]->id;
        }

        if ($request->wantsJson()) {
            return response()->json($message, 200, [], JSON_PRETTY_PRINT);
        } else {
            return redirect()->route($this->getRouteName('index'))
                             ->with('rafflesargentina.resource_controller.success', $message);
        }
    }
}
