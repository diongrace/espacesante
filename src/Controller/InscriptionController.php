<?php

namespace App\Controller;

use App\Entity\Inscription;
use App\Form\InscriptionType;
use App\Repository\InscriptionRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\Test\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/inscription")
 */
class InscriptionController extends AbstractController
{

    private InscriptionRepository $repoInsciption;

    public function __construct(
        InscriptionRepository $repoInsciption
    )
    {
        $this->repoInsciption = $repoInsciption;
    }
    
    /**
     * @Route("/recherche", name="app_inscription_search_gender", methods={"GET", "POST"})
     * @Route("/{sexe}/recherche-resultats", name="app_inscription_search_result", methods={"GET"})
     */
    public function getSearch(Request $request, $sexe = null): Response
    
    {

        $form = $this->createFormBuilder(null, [
            'method' => 'POST',
            'action' => $this->generateUrl('app_inscription_search_gender')
        ]);

        $form->add('sexe', ChoiceType::class, [
            'label' => 'Choisir le champs de la recherche',
            'choices' => [
                'choix' => 'choix',
                'Femme' => 'femme',
                'Homme' => 'homme',
            ]
        ]);

        $form = $form->getForm();

        $form->handleRequest($request);

    
        if ($sexe) {
            $inscriptions = $this->repoInsciption->findBySexe($sexe);
        }else {
            $inscriptions = $this->repoInsciption->findAll();
        }

        if ($form->isSubmitted() && $form->isValid()) {
           $data = $form->getData();
    
           return $this->redirectToRoute('app_inscription_search_result', [
            'sexe' => $data['sexe']
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->render('inscription/recherche.html.twig', [
            'form' => $form->createView(),
            'inscriptions' => $inscriptions
        ]);
    }

    /**
    
     * @Route("/", name="app_inscription_index", methods={"GET"})
     */
    public function index(InscriptionRepository $inscriptionRepository): Response
    
    {
        $inscriptions = $this->repoInsciption->findAll();
        return $this->render('inscription/index.html.twig', [
            'inscriptions' => $inscriptions,
        ]);
    }

    /**
     * @Route("/new", name="app_inscription_new", methods={"GET", "POST"})
     */
    public function new(Request $request, InscriptionRepository $inscriptionRepository): Response
    {
        $inscription = new Inscription();
        $form = $this->createForm(InscriptionType::class, $inscription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $inscriptionRepository->add($inscription);
            return $this->redirectToRoute('app_inscription_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('inscription/new.html.twig', [
            'inscription' => $inscription,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_inscription_show", methods={"GET"})
     */
    public function show(Inscription $inscription): Response
    {
        return $this->render('inscription/show.html.twig', [
            'inscription' => $inscription,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_inscription_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Inscription $inscription, InscriptionRepository $inscriptionRepository): Response
    {
        $form = $this->createForm(InscriptionType::class, $inscription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $inscriptionRepository->add($inscription);
            return $this->redirectToRoute('app_inscription_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('inscription/edit.html.twig', [
            'inscription' => $inscription,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_inscription_delete", methods={"POST"})
     */
    public function delete(Request $request, Inscription $inscription, InscriptionRepository $inscriptionRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$inscription->getId(), $request->request->get('_token'))) {
            $inscriptionRepository->remove($inscription);
        }

        return $this->redirectToRoute('app_inscription_index', [], Response::HTTP_SEE_OTHER);
    }
}
