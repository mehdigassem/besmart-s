<?php

namespace App\Form;

use App\Entity\Reclamation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Reclamation1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class,[
                'attr' => ['class' => 'form-control'],])
            ->add('prenom',TextType::class,[
                'attr' => ['class' => 'form-control'],])
            ->add('tel',TextType::class,[
                'attr' => ['class' => 'form-control'],])
            ->add('email',TextType::class,[
                'attr' => ['class' => 'form-control'],])
            ->add('description',TextType::class,[
                'attr' => ['class' => 'form-control'],])
            ->add('etat',TextType::class,[
                'attr' => ['class' => 'form-control'],])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reclamation::class,
        ]);
    }
}
