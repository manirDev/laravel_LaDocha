<?php
namespace App\Services;

use OpenAI;
use OpenAI\Exceptions\ErrorException;

class OpenAIService
{
    protected $client;

    public function __construct()
    {
        $this->client = OpenAI::client(env('OPENAI_API_KEY'));
    }

    public function generateProductDetails($productName)
    {

        try {
            $response = $this->client->completions()->create([
                'model' => 'gpt-3.5-turbo',
                'prompt' => "Generate product details for a product named: $productName",
                'max_tokens' => 100,
            ]);

            return $response['choices'][0]['text'];
        } catch (ErrorException $e) {
            if (strpos($e->getMessage(), 'quota') !== false) {
                dd('OpenAI API quota exceeded: ' . $e->getMessage());
                return 'Quota exceeded. Please check your OpenAI plan and billing details.';
            }

            // Handle other OpenAI errors
            dd('OpenAI API error: ' . $e->getMessage());
            return 'An error occurred while generating product details.';
        }
    }
}
