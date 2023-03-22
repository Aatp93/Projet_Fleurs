<?php

namespace App\Controller\Admin;

use App\Entity\Graine;

use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;

use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

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
            TextareaField::new('description'),
            TextField::new('imageFile')
                // ->setFormTypeOption('mapped', false)
                ->setFormType(VichImageType::class)
                ->hideOnIndex(),
            ImageField::new('image_name')
            // ->setFormTypeOption('mapped', false)
            ->setUploadDir('/public/images/')
            ->hideOnIndex()
            ->hideOnForm()
        ];
    }
}
