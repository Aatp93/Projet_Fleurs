<?php

namespace App\Controller\Admin;

use App\Entity\Graine;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class GraineCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Graine::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextField::new('couleur'),
            MoneyField::new('prix')->setCurrency('EUR'),
            NumberField::new('poid'),
            TextEditorField::new('description'),
            TextField::new('img')
            
        ];
    }
    
}
