<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BrandController extends AbstractController
{
    /**
     * @Route("/brand", name="brand_page")
     */
    public function brandPage(): Response
    {
        $brandListing = new \Pimcore\Model\DataObject\Brand\Listing();
        $brands = $brandListing->getObjects();

        return $this->render('default/brand.html.twig', [
            'brands' => $brands,
        ]);
    }
    public function showBrandDetail($brandName)
    {
        // You can use $brandName to retrieve models associated with the selected brand
        // Perform your logic here to fetch models based on the brand name
        
        // For example, if you have a Model entity and a repository, you can do something like this:
        $models = $this->getDoctrine()->getRepository(Model::class)->findBy(['brand' => $brandName]);

        // Replace the above line with your actual logic to fetch models

        return $this->render('default/brand_detail.html.twig', [
            'brandName' => $brandName,
            'models' => $models, // Pass the retrieved models to the template
        ]);
    }
}
