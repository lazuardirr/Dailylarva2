<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

class PagesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $currentRoute = Route::getRoutes()->match($request);
        $routeCollection = Route::getRoutes();
        $routeNameList = $this->getRouteNameList($routeCollection);
        $ActiveRoute = $this->getActiveRoute($routeNameList, $currentRoute);

        view()->share(compact('ActiveRoute'));
        return $next($request);
    }

    /**
     * @param $routeCollection
     * @return mixed
     */
    private function getRouteNameList($routeCollection)
    {
        $routeNameList = [];
        foreach ($routeCollection as $val) {
            $routeName = substr($val->getName(), 0, strpos($val->getName(), '.'));
            if ($routeName) {
                if (count($routeNameList) == 0) {
                    array_push($routeNameList, $routeName);
                } elseif ($routeNameList[count($routeNameList) - 1] != $routeName) {
                    array_push($routeNameList, $routeName);
                } else {

                }
            }

        }
        return $routeNameList;
    }

    /**
     * @param $routeNameList
     * @param $currentRoute
     * @return array
     */
    private function getActiveRoute($routeNameList, $currentRoute)
    {
        $ActiveRoute = [];
        foreach ($routeNameList as $val) {
            $currentRouteName = substr($currentRoute->getName(), 0, strpos($currentRoute->getName(), '.'));
            if ($currentRouteName == $val) {
                array_push($ActiveRoute, 1);
            } else {
                array_push($ActiveRoute, 0);
            }
        }
        return $ActiveRoute;
    }
}
