<?php

namespace App\Command;

use App\Repository\UserRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class SetUserRolesCommand extends Command
{
    protected static $defaultName = 'app:user:set-roles';

    public function __construct(private UserRepository $userRepository)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
       $user = $this-> userRepository->findOneByEmail('leonardo220389@hotmail.com');
       $user->setRoles(['ROLE_ADMIN']);
       $this->userRepository->add($user);
       return Command::SUCCESS;
    }
}