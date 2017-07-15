<?php

namespace App;

use Silex\Application;

class RoutesLoader
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->instantiateControllers();

    }

    private function instantiateControllers()
    {
        $this->app['custumer.controller'] = function() {
            return new Controllers\CustumerController($this->app['custumer.service']);
        };

        $this->app['formateur.controller'] = function() {
            return new Controllers\FormateurController($this->app['formateur.service']);
        };

        $this->app['training.controller'] = function() {
            return new Controllers\TrainingController($this->app['training.service']);
        };

        $this->app['landing.controller'] = function() {
            return new Controllers\LandingController($this->app['landing.service']);
        };


    }

    public function bindRoutesToControllers()
    {
        $api = $this->app["controllers_factory"];

        // customer
        $api->get('/custumers', "custumer.controller:getAll");
        $api->get('/custumer/{id}', "custumer.controller:getOne");
        $api->post('/custumer', "custumer.controller:save");
        $api->put('/custumer/{id}', "custumer.controller:update");
        $api->delete('/custumer/{id}', "custumer.controller:delete");

        // formateur
        $api->get('/formateurs', "formateur.controller:getAll");
        $api->get('/formateur/{id}', "formateur.controller:getOne");
        $api->post('/formateur', "formateur.controller:save");
        $api->put('/formateur/{id}', "formateur.controller:update");
        $api->delete('/formateur/{id}', "formateur.controller:delete");


        // training
        $api->get('/trainings', "training.controller:getAll");
        $api->get('/training/{id}', "training.controller:getOne");
        $api->post('/training', "training.controller:save");
        $api->put('/training/{id}', "training.controller:update");
        $api->delete('/training/{id}', "training.controller:delete");

        // landing
        $api->get('/landings', "landing.controller:getAll");
        $api->get('/landing/{id}', "landing.controller:getOne");
        $api->post('/landing', "landing.controller:save");
        $api->put('/landing/{id}', "landing.controller:update");
        $api->delete('/landing/{id}', "landing.controller:delete");





        $this->app->mount($this->app["api.endpoint"].'/'.$this->app["api.version"], $api);
    }
}

