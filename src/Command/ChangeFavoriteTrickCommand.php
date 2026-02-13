<?php

namespace App\Command;

use App\Entity\Skater;
use App\Repository\SkaterRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:favorite-trick:change',
    description: 'Change the favourite trick of a skater and persist it in database',
)]
class ChangeFavoriteTrickCommand
{
    public function __construct(
        public SkaterRepository $skaterRepository,
        public EntityManagerInterface $entityManager,
    ) {
    }

    public function __invoke(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $helper = new QuestionHelper();
        $question = new Question('Quel est le prénom du skater recherché?', false);
        $firstName = $helper->ask($input, $output, $question);

        $question = new Question('Quel est le nom du skater recherché?', false);
        $lastName = $helper->ask($input, $output, $question);

        $question = new Question('Quel est son nouveau trick favori?', false);
        $newFavoriteTrick = $helper->ask($input, $output, $question);

        $skater = $this->skaterRepository->findOneBy([
            'firstName' => $firstName,
            'lastName' => $lastName,
        ]);

        if (!$skater instanceof Skater) {
            $io->error('Ce skater n\'existe pas!');

            return Command::FAILURE;
        }

        $skater->favoriteTrick = $newFavoriteTrick;
        $this->entityManager->flush();

        $io->success(sprintf('%s %s a un nouveau trick favori : %s', $firstName, $lastName, $newFavoriteTrick));

        return Command::SUCCESS;
    }
}
