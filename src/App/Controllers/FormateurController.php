<?php

namespace App\Controllers;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class FormateurController
{

    protected $formateurService;

    public function __construct($service)
    {
        $this->formateurService = $service;
    }

    public function getOne($id)
    {
        return new JsonResponse($this->formateurService->getOne($id));
    }

    public function getAll()
    {
        return new JsonResponse($this->formateurService->getAll());
    }

    public function save(Request $request)
    {

        $formateur = $this->getDataFromRequest($request);
        return new JsonResponse(array("id_Formateur" => $this->formateurService->save($formateur)));

    }

    public function update($id, Request $request)
    {
        $formateur = $this->getDataFromRequest($request);
        $this->formateurService->update($id, $formateur);
        return new JsonResponse($formateur);

    }

    public function delete($id)
    {

        return new JsonResponse($this->formateurService->delete($id));

    }

    public function getDataFromRequest(Request $request)
    {
        return $formateur = array(

            'FirstName' =>  $request->request->get('FirstName'),
            'LastName' => $request->request->get('LastName'),
            'Phone' => $request->request->get('Phone'),
            'Email' => $request->request->get('Email'),
            'Adresse' => $request->request->get('Adresse'),
            'StudyLevel' => $request->request->get('StudyLevel'),
            'Photo' => $request->request->get('Photo'),

        );
    }
}
