<?php

namespace App\Service\Mailing;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;

class MailingService
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer) {
        $this->mailer = $mailer;
    }

    public function sendEmail(array $form): JsonResponse
    {
        $email = (new TemplatedEmail())
        ->from($form['email'])
        ->to('contact@thomas-luminic.tec')
        ->subject('Message depuis le portfolio !')
        ->htmlTemplate('emails/contact.html.twig')
        ->context([
            'date' => new \DateTime(),
            'firstname' => $form['firstname'],
            'lastname' => $form['lastname'],
            'content' => $form['content'],
        ]);

        try {
            $this->mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            return new JsonResponse('Une erreur est survenu', 404);
        }
        return new JsonResponse('Votre message à bien était envoyer');
    }
}
