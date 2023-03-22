<?php

namespace App\Controller\Admin;

use App\Entity\Actualite;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ActualiteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Actualite::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextareaField::new('description'),
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
