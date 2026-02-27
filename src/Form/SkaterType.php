<?php

namespace App\Form;

use App\Entity\Skater;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SkaterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastName', TextType::class)
            ->add('firstName', TextType::class)
            ->add('nationality', TextType::class)
            ->add('birthyear', IntegerType::class)
            ->add('favoriteTrick', TextType::class)
            ->add('winSLS', CheckboxType::class, ['required' => false])
            ->add('send', SubmitType::class, ['label' => 'Créer un nouveau skater!', 'attr' => [
                'class' => 'button-submit']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Skater::class,
        ]);
    }
}
