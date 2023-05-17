<?php

namespace Marshmallow\Maintenance\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Marshmallow\HelperFunctions\Facades\URL;
use Marshmallow\Maintenance\MaintenanceMode;

class ToolController extends Controller
{
    public function up(Request $request)
    {
        MaintenanceMode::up();

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
}
