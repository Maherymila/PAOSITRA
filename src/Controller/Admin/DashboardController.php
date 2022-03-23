<?php

namespace App\Controller\Admin;

use App\Entity\Action;
use App\Entity\Administrateur;
use App\Entity\Agences;
use App\Entity\Bureau;
use App\Entity\Categorie;
use App\Entity\Mouvements;
use App\Entity\Produits;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('CENTRE d"APPROVISIONNEMENT DES VALEURS POSTALES');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Dashboard', 'fa fa-home', 'app_homepage');
        yield MenuItem::linkToCrud('Administrateur', 'fas fa-user', Administrateur::class);
        yield MenuItem::linkToCrud('Produits', 'fas fa-list', Produits::class);
        yield MenuItem::linkToCrud('Agences', 'fas fa-list', Agences::class);
        yield MenuItem::linkToCrud('Action', 'fas fa-list', Action::class);
        yield MenuItem::linkToCrud('Mouvements', 'fas fa-list', Mouvements::class);
        yield MenuItem::linkToCrud('Categorie', 'fas fa-list', Categorie::class);
        yield MenuItem::linkToCrud('Bureau', 'fas fa-house-user', Bureau::class);
    }
}
