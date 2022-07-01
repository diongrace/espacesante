<?php

namespace App\Controller;

use App\Entity\Lits;
use App\Form\LitsType;
use App\Repository\LitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lits")
 */
class LitsController extends AbstractController
{
    /**
     * @Route("/", name="app_lits_index", methods={"GET"})
     */
    public function index(LitsRepository $litsRepository): Response
    {
        return $this->render('lits/index.html.twig', [
            'lits' => $litsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_lits_new", methods={"GET", "POST"})
     */
    public function new(Request $request, LitsRepository $litsRepository): Response
    {
        $lit = new Lits();
        $form = $this->createForm(LitsType::class, $lit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $litsRepository->add($lit);
            return $this->redirectToRoute('app_lits_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('lits/new.html.twig', [
            'lit' => $lit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_lits_show", methods={"GET"})
     */
    public function show(Lits $lit): Response
    {
        return $this->render('lits/show.html.twig', [
            'lit' => $lit,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_lits_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Lits $lit, LitsRepository $litsRepository): Response
    {
        $form = $this->createForm(LitsType::class, $lit);
        $form->remove('numero');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $litsRepository->add($lit);
            return $this->redirectToRoute('app_lits_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('lits/edit.html.twig', [
            'lit' => $lit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_lits_delete", methods={"POST"})
     */
    public function delete(Request $request, Lits $lit, LitsRepository $litsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lit->getId(), $request->request->get('_token'))) {
            $litsRepository->remove($lit);
        }

        return $this->redirectToRoute('app_lits_index', [], Response::HTTP_SEE_OTHER);
    }
}
