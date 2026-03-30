<?php

namespace App\Form;

use App\Repository\SkaterRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChooseCountryType extends AbstractType
{
    public function __construct(private readonly SkaterRepository $skaterRepository)
    {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $countries = $this->skaterRepository->getDistinctCountry();
        $formattedCountries = [];
        foreach ($countries as $country) {
            $formattedCountries[$country] = $country;
        }

        $builder
            ->add('country', CountryType::class, [
                'choice_loader' => null,
                'choices' => $formattedCountries,
            ])
            ->add('send', SubmitType::class, ['label' => 'Sélectionnez un pays!', 'attr' => [
                'class' => 'button-submit']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => null,
        ]);
    }
}
