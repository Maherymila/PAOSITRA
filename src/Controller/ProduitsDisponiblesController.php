<?php

namespace App\Controller;

use App\Entity\Produits;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Dompdf\Dompdf as Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitsDisponiblesController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/produits/disponibles", name="produits_disponibles")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Produits::class);
        $produits = $repository->findProCat();
        //dd($produits);

        return $this->render('Impression/produits_disponibles/index.html.twig', ['prod' => $produits]);
    }

    /**
     * @Route("/download", name="download_dispo")
     */
    public function liste(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Produits::class);
        $produits = $repository->findProCat();
        //dd($produits);

        $pdfOptions = new Options();
        $pdfOptions->set('DefaultFont', 'Arial');
        $pdfOptions->setIsRemoteEnabled(true);

        $dompdf = new Dompdf($pdfOptions);
        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'Allow_self_signed' => true,
            ],
        ]);
        $dompdf->setHttpContext($context);

        $html = $this->renderView('download.html.twig', ['prod' => $produits]);

        $dompdf->loadHTML($html);
        $dompdf->setPaper('A4', 'Portrait');
        $dompdf->render();

        $fichier = 'disponible.pdf';

        $dompdf->stream($fichier, [
            'Attachement' => true,
        ]);

        return new Response();
    }
}
