<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class Openai
{
    // Clé API OpenAI (remplacez par votre propre clé, de préférence stockée dans une variable d'environnement)
    private string $apiKey = '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';

    

    /**
     * Génère une réponse en utilisant OpenAI.
     *
     * @param string $message Le message d'entrée pour la génération de réponse.
     * @return string La réponse générée par OpenAI.
     */
    public function generateResponse(string $message): string
    {
        $httpClient = new HttpClient();
        // Crée une demande de complétion à OpenAI
        $response = $httpClient::create()->request('POST', 'https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
            ],
            'json' => [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ["role" => "system", "content" => "quelle est la couleur du rouge ?"],
                    ["role" => "user", "content" => $message], // User's message
                ],
            ],
        ]);

        // Décode la réponse JSON
        $responseData = $response->toArray();

        // Récupère le texte généré en réponse à la complétion
        return $responseData['choices'][0]['messages'];
    }
}
