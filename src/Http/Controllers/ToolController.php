<?php

namespace Marshmallow\Maintenance\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Marshmallow\HelperFunctions\Facades\URL;
use Marshmallow\Maintenance\MaintenanceMode;

class ToolController extends Controller
{
    public function up(Request $request)
    {
//        MaintenanceMode::up();
        Artisan::call('up');
//        exec('nohup php artisan up > /dev/null &');


        return response([
            'message' => 'Application is now live',
            'currentlyInMaintenance' => app()->isDownForMaintenance(),
        ], 200);
    }

    public function down(Request $request)
    {
        MaintenanceMode::down($request);

        if (URL::isNova($request)) {
            return redirect($request->get('secret'));
        }
    }

    public function status(Request $request)
    {
        return response([
            'currentlyInMaintenance' => app()->isDownForMaintenance(),
        ], 200);
    }

    public function config(Request $request)
    {
        return array_merge(
            config('maintenance'),
            [
                'currentlyInMaintenance' => app()->isDownForMaintenance(),
            ]
        );
    }
}
