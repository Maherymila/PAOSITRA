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

class EntreProduitsController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/entre/produits", name="entre_produits")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Produits::class);
        $produits = $repository->findEntrerPro();
        //dd($produits);

        return $this->render('Impression/entre_produits/index.html.twig', ['entrer' => $produits]);
    }

    /**
     * @Route("/downloadE", name="download_Entrer")
     */
    public function liste(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Produits::class);
        $produits = $repository->findEntrerPro();
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

        $html = $this->renderView('downEntre.html.twig', ['entrer' => $produits]);

        $dompdf->loadHTML($html);
        $dompdf->setPaper('A4', 'Portrait');
        $dompdf->render();

        $fichier = 'Entré.pdf';

        $dompdf->stream($fichier, [
            'Attachement' => true,
        ]);

        return new Response();
    }
}
