<?php

namespace App\Form;

use App\Repository\SkaterRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChooseFavoriteTrickType extends AbstractType
{
    public function __construct(private readonly SkaterRepository $skaterRepository)
    {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $favoriteTrick = $this->skaterRepository->getDistinctFavoriteTrick();
        $formatedFavoriteTrick = [];
        foreach ($favoriteTrick as $fTrick) {
            $formatedFavoriteTrick[$fTrick] = $fTrick;
        }

        $builder
            ->add('favorite_trick', ChoiceType::class, [
                'choices' => $formatedFavoriteTrick,
            ])
            ->add('send', SubmitType::class, ['label' => 'Sélectionnez un trick!', 'attr' => [
                'class' => 'button-submit']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => null]);
    }
}
