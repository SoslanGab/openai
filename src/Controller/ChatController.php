<?php

namespace App\Controller; 

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Openai;

class ChatController extends AbstractController
{
    
    #[Route('/', name: 'app_home')]
    public function index()
    {
        $chat = new Openai;

        $message = "GPT is";

        // Utilise le service Chat pour générer une réponse à partir du message
        $response = $chat->generateResponse($message);

        // Renvoie la réponse générée
        dd ($response);

    }

}
