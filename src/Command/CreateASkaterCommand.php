<?php

namespace App\Command;

use App\Entity\Skater;
use App\Factory\SkaterFactory;
use App\Repository\SkaterRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use function Zenstruck\Foundry\runCommand;

#[AsCommand(
    name: 'app:create:skater',
    description: 'Create a new skater',
)]
class CreateASkaterCommand
{
    public function __construct(
        public readonly EntityManagerInterface $entityManager,
        private readonly SkaterRepository $skaterRepository)
    {
    }

    public function __invoke(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $helper = new QuestionHelper();
        $question1 = new Question('Quel est son prénom?', false);
        $firstName = $helper->ask($input, $output, $question1);
        if (preg_match('/\d/', $firstName)) {
            $io->error('Le prénom n\'est pas valide');
        }

        $helper = new QuestionHelper();
        $question2 = new Question('Quel est son nom?', false);
        $lastName = $helper->ask($input, $output, $question2);
        if (preg_match('/\d/', $lastName)) {
            $io->error('Le nom n\'est pas valide');
            return Command::FAILURE;
        }

        $helper = new QuestionHelper();
        $question3 = new Question('Quelle est sa nationalité?', false);
        $nationality = $helper->ask($input, $output, $question3);
        if (preg_match('/\d/', $nationality)) {
            $io->error('La nationalité n\'est pas valide');
            return Command::FAILURE;
        }

        $helper = new QuestionHelper();
        $question4 = new Question('Quelle est son année de naissance?', false);
        $birthyear = (int) $helper->ask($input, $output, $question4);
        if (
            !is_numeric($birthyear) ||
            $birthyear < 1900 ||
            $birthyear > new \DateTimeImmutable('now')->format('Y')
        ) {
            $io->error('Veuillez entrer une année de naissance valide');
            return Command::FAILURE;
        }

        $helper = new QuestionHelper();
        $question5 = new Question('Quel est son trick favori?', false);
        $favoriteTrick = $helper->ask($input, $output, $question5);

        $helper = new QuestionHelper();
        $question6 = new Question('A-t il gagné ?', false);
        $slsWinStr = strtolower($helper->ask($input, $output, $question6));

        if ($slsWinStr !== "oui" && $slsWinStr !== "non"){
            $io->error('Veuillez répondre "oui" ou "non"');
            return Command::FAILURE;
        }

        $slsWin = match ($slsWinStr) {
            'oui' => true,
            'non' => false,
        };

        $newSkater = new Skater();
        $newSkater->lastName = $lastName;
        $newSkater->firstName = $firstName;
        $newSkater->nationality = $nationality;
        $newSkater->birthyear = $birthyear;
        $newSkater->favoriteTrick = $favoriteTrick;
        $newSkater->winSLS = $slsWin;


        $skater = $this->skaterRepository->findOneBy([
            'firstName' => $firstName,
            'lastName' => $lastName,
        ]);

        if ($skater) {
            $io->error('Ce skater existe déjà');
            return Command::FAILURE;
        }

        $this->entityManager->persist($newSkater);
        $this->entityManager->flush();

        $io->success(sprintf('Vous avez un nouveau skater : %s %s (%s), né en %s. Son trick favori est %s. A t il gagné la SLS? %s', $firstName, $lastName,$nationality,$birthyear,$favoriteTrick,$slsWin));

        return Command::SUCCESS;
    }
}
