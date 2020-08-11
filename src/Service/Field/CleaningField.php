<?php


namespace App\Service\Field;


class CleaningField
{
    public function hasAllContactFields($form): ?array
    {
        $message = [];
        if (!$form->has('firstname')) {
            $message['firstname'] = 'Votre prénom est vide';
        }
        if (!$form->has('lastname')) {
            $message['lastname'] = 'Votre prénom est vide';
        }
        if (!$form->has('email')) {
            $message['email'] = 'Votre email est vide';
        }
        if (!$form->has('content')) {
            $message['content'] = 'Votre message est vide';
        }
        return $message;
    }

    public function cleaningFields($form): array
    {
        $cleaningForm = [];
        foreach ($form as $key => $value) {
            $cleaningForm[$key] = trim(strip_tags($value));
        }
        return $cleaningForm;
    }
}
