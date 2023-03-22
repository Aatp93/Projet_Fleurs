<?php

namespace App\Controller\Admin;

use App\Entity\Atelier;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AtelierCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Atelier::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('nom'),
            TextareaField::new('description'),
            DateField::new('date'),
            TextField::new('imageFile')
                // ->setFormTypeOption('mapped', false)
                ->setFormType(VichImageType::class)
                ->hideOnIndex(),
            ImageField::new('image')
                // ->setFormTypeOption('mapped', false)
                ->setUploadDir('/public/images/')
                ->hideOnIndex()
                ->hideOnForm()
        ];
    }
}
