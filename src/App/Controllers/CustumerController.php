<?php

namespace App\Controllers;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class CustumerController
{

    protected $customerService;

    public function __construct($service)
    {
        $this->customerService = $service;
    }

    public function getOne($id)
    {
        return new JsonResponse($this->customerService->getOne($id));
    }

    public function getAll()
    {
        return new JsonResponse($this->customerService->getAll());
    }

    public function save(Request $request)
    {

        $custumer = $this->getDataFromRequest($request);
        return new JsonResponse(array("id_Custumer" => $this->customerService->save($custumer)));

    }

    public function update($id, Request $request)
    {
        $custumer = $this->getDataFromRequest($request);
        $this->customerService->update($id, $custumer);
        return new JsonResponse($custumer);

    }

    public function delete($id)
    {

        return new JsonResponse($this->customerService->delete($id));

    }

    public function getDataFromRequest(Request $request)
    {
        return $custumer = array(
            'FirstName' =>  $request->request->get('FirstName'),
            'LastName' => $request->request->get('LastName'),
            'Phone' => $request->request->get('Phone'),
            'Email' => $request->request->get('Email'),
            'Adresse' => $request->request->get('Adresse'),
            'id_Training' => $request->request->get('id_Training'),
        );
    }
}
