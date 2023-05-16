<?php

namespace App\Controller;

use App\Entity\Categories;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager, PaginatorInterface $paginator, Request $request): Response
    {
        // Get all categories from the database
        $categories = $entityManager->getRepository(Categories::class)->findAll();
        // $articles = $entityManager->getRepository(Articles::class)->findAll();

        // // send categories with articles
        // $categories = $entityManager->getRepository(Category::class)->findCategoriesWithArticles();

        // $articles = $paginator->paginate(
        //     $articles, /* query NOT result */
        //     $request->query->getInt('page', 1), /*page number*/
        //     3 /*limit per page*/
        // );

        // Render the homepage view and pass the categories to it
        return $this->render('home/index.html.twig', [
            'categories' => $categories,
            // 'articles' => $articles,
        ]);
    }
}
