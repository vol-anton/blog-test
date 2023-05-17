<?php

namespace App\Controller;

use App\Entity\Contacts;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request,EntityManagerInterface $entityManager, ValidatorInterface $validator): Response
    {

            // create le form à partir de l'instance de la class contact
            // le form est lié à la class contact
            // la class contact est instanciée car initialiser des valeurs à mes champs (fields)

            $contact = new Contacts();
            $form = $this->createForm(ContactType::class, $contact);
            $form->handleRequest($request);

            // récupérer les msg d'erreur
            // les afficher différemment

            if ($form->isSubmitted()) {

                $errors = $validator->validate($contact);

                    if(count($errors) > 0) {

                        return $this->render('contact/index.html.twig', [
                            'contact_form' =>$form,
                            'errors' => $errors
                        ]);
                }


            }

        return $this->render('contact/index.html.twig', [
            'contact_form' => $form,
        ]);
    }
}
