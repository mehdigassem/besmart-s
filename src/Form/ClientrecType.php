<?php

namespace App\Form;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Clientrec;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Captcha\Bundle\CaptchaBundle\Form\Type\CaptchaType;
use Captcha\Bundle\CaptchaBundle\Validator\Constraints\ValidCaptcha;

class ClientrecType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
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




        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Clientrec::class,
        ]);
    }
}
