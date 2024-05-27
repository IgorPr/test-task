<?php

namespace App\Controller;

use Knp\Component\Pager\PaginatorInterface;
use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends FrontendController
{
    /**
     * @Route("/news", name="news-listing")
     */
    public function listingAction(Request $request, PaginatorInterface $paginator): Response
    {
//        $newsList = new News\Listing;
//        $newsList->setOrderKey('date');
//        $newsList->setOrder('DESC');
//
//        $paginator = $paginator->paginate(
//            $newsList,
//            $request->get('page', 1),
//            6
//        );

        return $this->render('news/listing.html.twig', [
            'news' => $paginator
        ]);
    }
}
