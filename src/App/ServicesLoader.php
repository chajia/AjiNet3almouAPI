<?php

namespace App;

use Silex\Application;

class ServicesLoader
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function bindServicesIntoContainer()
    {
        $this->app['custumer.service'] = function() {
            return new Services\CustumerService($this->app["db"]);
        };

        $this->app['formateur.service'] = function() {
            return new Services\FormateurService($this->app["db"]);
        };

        $this->app['training.service'] = function() {
            return new Services\TrainingService($this->app["db"]);
        };

        $this->app['landing.service'] = function() {
            return new Services\LandingService($this->app["db"]);
        };
    }
}

