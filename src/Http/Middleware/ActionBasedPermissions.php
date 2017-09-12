<?php

namespace RafflesArgentina\UserRoleAndPermission\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

use Caffeinated\Shinobi\Models\Permission;

class ActionBasedPermissions
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;

        $this->alias = config('user-role-and-permission.alias');
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $rMethods = [
            'index',
            'create',
            'store',
            'show',
            'edit',
            'update',
            'destroy',
        ];

        $name = $request->route()->getName();
        $action = explode('@', $request->route()->getActionName())[1];

        $name = $action === 'store' ? str_replace('store', 'create', $name) : $name;
        $name = $action === 'show' ? str_replace('show', 'index', $name) : $name;
        $name = $action === 'update' ? str_replace('update', 'edit', $name) : $name;
        $name = str_replace($this->alias, '', $name); 

        if(!in_array($action, $rMethods) || !$this->auth->user()->can($name)) {
            if($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 403);
            } else {
                $permission = Permission::where('name', $name)->first();
                if (!is_null($permission)) {
                    $action = $permission->description;
                    $message = 'No tenés privilegios para realizar esa acción: '.$action;
                } else {
                    $description = [
                        'index' => 'Listar o ver detalles',
                        'create' => 'Crear nuevos registros',
                        'edit' => 'Actualizar registros',
                        'destroy' => 'Eliminar registros',
                    ];
                    $resourceName = explode('.', $name)[0];
                    $action = array_key_exists($action, $description) ? $description[$action] : '';
                    $message = 'No tenés privilegios para realizar esa acción: '.$action.' de '.$resourceName;
                }

                return redirect()->back()->with('rafflesargentina.resource_controller.error', $message);
            }
        }
        return $next($request);
    }
}
