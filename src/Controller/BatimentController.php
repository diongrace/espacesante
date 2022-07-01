<?php

namespace App\Controller;

use App\Entity\Batiment;
use App\Form\BatimentType;
use App\Repository\BatimentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/batiment")
 */
class BatimentController extends AbstractController
{
    /**
     * @Route("/", name="app_batiment_index", methods={"GET"})
     */
    public function index(BatimentRepository $batimentRepository): Response
    {
        return $this->render('batiment/index.html.twig', [
            'batiments' => $batimentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_batiment_new", methods={"GET", "POST"})
     */
    public function new(Request $request, BatimentRepository $batimentRepository): Response
    {
        $batiment = new Batiment();
        $form = $this->createForm(BatimentType::class, $batiment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $batimentRepository->add($batiment);
            return $this->redirectToRoute('app_batiment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('batiment/new.html.twig', [
            'batiment' => $batiment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_batiment_show", methods={"GET"})
     */
    public function show(Batiment $batiment): Response
    {
        return $this->render('batiment/show.html.twig', [
            'batiment' => $batiment,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_batiment_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Batiment $batiment, BatimentRepository $batimentRepository): Response
    {
        $form = $this->createForm(BatimentType::class, $batiment);
        $form->remove('numero');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $batimentRepository->add($batiment);
            return $this->redirectToRoute('app_batiment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('batiment/edit.html.twig', [
            'batiment' => $batiment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_batiment_delete", methods={"POST"})
     */
    public function delete(Request $request, Batiment $batiment, BatimentRepository $batimentRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$batiment->getId(), $request->request->get('_token'))) {
            $batimentRepository->remove($batiment);
        }

        return $this->redirectToRoute('app_batiment_index', [], Response::HTTP_SEE_OTHER);
    }
}
