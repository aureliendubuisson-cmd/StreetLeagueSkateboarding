<?php

namespace App\Form;

use App\Entity\Trick;
use App\Enum\Level;
use App\Enum\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrickType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('type', EnumType::class, ['class' => Type::class])
            ->add('level', EnumType::class, ['class' => Level::class])
            ->add('send', SubmitType::class, ['label' => 'Ajouter un nouveau trick!', 'attr' => [
                'class' => 'button-submit']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trick::class,
        ]);
    }
}
