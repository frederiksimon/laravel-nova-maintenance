<?php

namespace Marshmallow\Maintenance;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\View;


class MaintenanceMode
{
    /**
     * Bring Application out of Maintenance Mode
     *
     * @return void
     */
    public static function up()
    {
        unlink(storage_path('framework/down'));
        return;
    }

    /**
     * Put Application into Maintenance Mode
     *
     */
    public static function down($request)
    {
        $props = $request->only(['message', 'redirect', 'render', 'refresh', 'secret', 'retry']);

        $retry = data_get($props, 'retry');

        $retry_seconds = is_numeric($retry) && $retry > 0 ? (int) $retry : null;

        $view = View::make(data_get($props, 'render'), [
            'message' => data_get($props, 'message'),
        ])->render();

        $payload = [
            'time' => now()->timestamp,
            'message' => data_get($props, 'message'),
            'retry' => $retry_seconds,
            'redirect' => data_get($props, 'redirect'),
            'status' => 503,
            'refresh' => data_get($props, 'refresh'),
            'secret' => data_get($props, 'secret'),
            'template' => $view,
        ];

        file_put_contents(
            storage_path('framework/down'),
            json_encode($payload, JSON_PRETTY_PRINT)
        );

        return;
    }
}
