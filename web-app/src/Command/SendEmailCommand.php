<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;


class SendEmailCommand extends Command
{
    protected static $defaultName = 'app:send-test-email';

    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        parent::__construct();
        $this->mailer = $mailer;
    }

    protected function configure()
    {
        $this
            ->setName('app:send-email')
            ->setDescription('Send a test email');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Enviando..xx');
        try {
            $email = (new Email())
                ->from('noreply@myxperiences.org')
                ->to('')
                ->subject('Test Email')
                ->text('This is a test email sent via Amazon SES.');

            $this->mailer->send($email);


            $output->writeln('Email sent successfully.');
        } catch (TransportExceptionInterface $e) {
            $output->writeln('error');
            $output->writeln($e);
        }

        return Command::SUCCESS;
    }
}
