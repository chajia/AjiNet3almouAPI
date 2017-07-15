<?php

namespace App\Controllers;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class TrainingController
{

    protected $trainingService;

    public function __construct($service)
    {
        $this->trainingService = $service;
    }

    public function getOne($id)
    {
        return new JsonResponse($this->trainingService->getOne($id));
    }

    public function getAll()
    {
        return new JsonResponse($this->trainingService->getAll());
    }

    public function save(Request $request)
    {

        $training = $this->getDataFromRequest($request);
        return new JsonResponse(array("id_Training" => $this->trainingService->save($training)));

    }

    public function update($id, Request $request)
    {
        $training = $this->getDataFromRequest($request);
        $this->trainingService->update($id, $training);
        return new JsonResponse($training);

    }

    public function delete($id)
    {

        return new JsonResponse($this->trainingService->delete($id));

    }

    public function getDataFromRequest(Request $request)
    {
        return $training = array(

            'Label' =>  $request->request->get('Label'),
            'DateBeginning' => $request->request->get('DateBeginning'),
            'Description' => $request->request->get('Description'),
            'Type' => $request->request->get('Type'),
            'Place' => $request->request->get('Place'),
            'id_Formateur' => $request->request->get('id_Formateur'),

        );
    }
}
