<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublicControllerJson
{
    #[Route("/api/quote")]
    public function jsonNumber(): Response
    {
        // Generate random quote
        $quotes = array();
        $quotes[] = "\"To give oneself earnestly to the duties due to men, and, while respecting spiritual beings, to keep aloof from them, may be called wisdom.\" - Confucius";
        $quotes[] = "\"When in doubt, tell the truth.\" - Mark Twain";
        $quotes[] = "\"True friends stab you in the front.\" - Oscar Wilde";
        $random_quote = $quotes[array_rand($quotes)];

        // Generate date details
        date_default_timezone_set('Europe/Stockholm');
        $date = date('Y-m-d');
        $time = date('H:i:s');

        $data = [
            'quote' => $random_quote,
            'date' => $date,
            'time' => $time
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }
}
