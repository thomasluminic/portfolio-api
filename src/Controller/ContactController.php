<?php

namespace App\Controller;

use App\Service\Field\CleaningField;
use App\Service\Mailing\MailingService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact", methods={"POST"})
     * @param Request $request
     * @param MailingService $mailing
     * @return JsonResponse
     */
    public function index(Request $request, MailingService $mailing, CleaningField $cleaningField): JsonResponse
    {
        $form = $request->request;
        $errorMessage = $cleaningField->hasAllContactFields($form);
        if (!$errorMessage) {
            $form = $cleaningField->cleaningFields($form);
            return $mailing->sendEmail($form);
        } else {
            return new JsonResponse($errorMessage, 400);
        }
    }
}
