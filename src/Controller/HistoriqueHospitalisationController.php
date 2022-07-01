<?php

namespace App\Controller;

use App\Entity\HistoriqueHospitalisation;
use App\Form\HistoriqueHospitalisationType;
use App\Repository\HistoriqueHospitalisationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/historique/hospitalisation")
 */
class HistoriqueHospitalisationController extends AbstractController
{
    /**
     * @Route("/", name="app_historique_hospitalisation_index", methods={"GET"})
     */
    public function index(HistoriqueHospitalisationRepository $historiqueHospitalisationRepository): Response
    {
        return $this->render('historique_hospitalisation/index.html.twig', [
            'historique_hospitalisations' => $historiqueHospitalisationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_historique_hospitalisation_new", methods={"GET", "POST"})
     */
    public function new(Request $request, HistoriqueHospitalisationRepository $historiqueHospitalisationRepository): Response
    {
        $historiqueHospitalisation = new HistoriqueHospitalisation();
        $form = $this->createForm(HistoriqueHospitalisationType::class, $historiqueHospitalisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $historiqueHospitalisationRepository->add($historiqueHospitalisation);
            return $this->redirectToRoute('app_historique_hospitalisation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('historique_hospitalisation/new.html.twig', [
            'historique_hospitalisation' => $historiqueHospitalisation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_historique_hospitalisation_show", methods={"GET"})
     */
    public function show(HistoriqueHospitalisation $historiqueHospitalisation): Response
    {
        return $this->render('historique_hospitalisation/show.html.twig', [
            'historique_hospitalisation' => $historiqueHospitalisation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_historique_hospitalisation_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, HistoriqueHospitalisation $historiqueHospitalisation, HistoriqueHospitalisationRepository $historiqueHospitalisationRepository): Response
    {
        $form = $this->createForm(HistoriqueHospitalisationType::class, $historiqueHospitalisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $historiqueHospitalisationRepository->add($historiqueHospitalisation);
            return $this->redirectToRoute('app_historique_hospitalisation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('historique_hospitalisation/edit.html.twig', [
            'historique_hospitalisation' => $historiqueHospitalisation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_historique_hospitalisation_delete", methods={"POST"})
     */
    public function delete(Request $request, HistoriqueHospitalisation $historiqueHospitalisation, HistoriqueHospitalisationRepository $historiqueHospitalisationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$historiqueHospitalisation->getId(), $request->request->get('_token'))) {
            $historiqueHospitalisationRepository->remove($historiqueHospitalisation);
        }

        return $this->redirectToRoute('app_historique_hospitalisation_index', [], Response::HTTP_SEE_OTHER);
    }
}
