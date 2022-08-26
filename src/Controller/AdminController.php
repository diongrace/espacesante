<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\EditUserType;
use App\Repository\UserRepository;
use App\Repository\InscriptionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="app_admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
    /**
     * Listes des utilisateurs du site
     * 
     * @Route("/utilisateurs", name="utilisateurs")
     */
    public function userList(UserRepository $user){
        return $this->render('admin/user.html.twig', [
            'users' => $user->findAll()
        ]);
 /**
     * modifier les utilisateurs
     * 
     * @Route("/utilisateurs/modifier/{id}", name="modifier_utilisateurs")
     */
    }
    public function editUser(User $user, Request $request){
        $form = $this->createForm(EditUserType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('message', 'utilisateur modifier avec succes');
            return $this->redirectToRoute('admin_utilisateurs');
        }
        return $this->render('admin/edituser.html.twig', [
            'userForm' => $form->createView()
        ]);

    }
    /**
     * @Route("/statistique", name="statistique")
     */
    public function statistiques(InscriptionRepository $repoInsciption){
        //on va chercher toutes les utilisateurs
        $inscriptions = $repoInsciption->findAll();
        $value = [
            'homme' => 0,
            'femme' => 0,
        ];
        $femme = 0;
        $homme = 0;
        foreach ($inscriptions as $inscription) {
             $sexe = $inscription->getGenre();
             if ($sexe === 'femme') 
             {
                $femme = $femme + 1;
                 $value["femme"] = $femme; 
             }else {
                $homme = $homme + 1;
                $value["homme"] = $homme;
             }
        }

        // $value = json_encode($value);
        return $this->render('admin/statistique.html.twig', [
            'value' => $value,
        ]);
    }
}
