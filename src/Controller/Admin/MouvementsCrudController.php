<?php

namespace App\Controller\Admin;

use App\Entity\Mouvements;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MouvementsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Mouvements::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('Produits'),
            AssociationField::new('Action'),
            IntegerField::new('quantiter'),
            AssociationField::new('Agences'),
            TextField::new('Reference'),
            DateField::new('Date'),
            AssociationField::new('Administrateur')
        ];
    }
    
}
