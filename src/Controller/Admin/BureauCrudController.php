<?php

namespace App\Controller\Admin;

use App\Entity\Bureau;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BureauCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bureau::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
