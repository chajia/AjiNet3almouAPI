<?php

namespace App\Controllers;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class LandingController
{

    protected $landingService;

    public function __construct($service)
    {
        $this->landingService = $service;
    }

    public function getOne($id)
    {
        return new JsonResponse($this->landingService->getOne($id));
    }

    public function getAll()
    {
        return new JsonResponse($this->landingService->getAll());
    }

    public function save(Request $request)
    {

        $landing = $this->getDataFromRequest($request);
        // sending mail

        return new JsonResponse(array("id_Landing" => $this->landingService->save($landing)));

    }

    public function update($id, Request $request)
    {
        $landing = $this->getDataFromRequest($request);
        $this->landingService->update($id, $landing);
        return new JsonResponse($landing);

    }

    public function delete($id)
    {

        return new JsonResponse($this->landingService->delete($id));

    }

    public function getDataFromRequest(Request $request)
    {
        return $landing = array(

            'Email' =>  $request->request->get('Email'),

        );
    }
}
