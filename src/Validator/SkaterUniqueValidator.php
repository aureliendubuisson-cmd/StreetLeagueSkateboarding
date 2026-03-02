<?php

namespace App\Validator;

use App\Entity\Skater;
use App\Repository\SkaterRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class SkaterUniqueValidator extends ConstraintValidator
{
    public function __construct(private readonly SkaterRepository $skaterRepository)
    {
    }

    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$value instanceof Skater) {
            throw new UnexpectedValueException($value, Skater::class);
        }

        if (!$constraint instanceof SkaterUnique) {
            throw new UnexpectedTypeException($constraint, SkaterUnique::class);
        }

        $skater = $this->skaterRepository->findOneBy([
            'firstName' => $value->firstName,
            'lastName' => $value->lastName,
            'birthyear' => $value->birthyear,
        ]);

        if ($skater) {
            $this->context->buildViolation($constraint->errorMessage)
                ->addViolation();
        }
    }
}
