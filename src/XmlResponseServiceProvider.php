<?php

namespace Codeurx\XmlResponse;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class XmlResponseServiceProvider extends ServiceProvider
{
    public function register()
    {
        Response::macro('xml', function ($value, $status = 200, $headerTemplate = []) {
            return (new XmlResponse())->array2xml($value, false, $headerTemplate, $status);
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/Config/Config.php' => config_path('xml.php'),
        ]);
    }
}
