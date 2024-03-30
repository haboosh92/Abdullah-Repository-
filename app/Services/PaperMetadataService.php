<?php
// app/Services/PaperMetadataService.php

namespace App\Services;

use GuzzleHttp\Client;

class PaperMetadataService
{
protected $client;

public function __construct()
{
$this->client = new Client();
}

public function getPaperMetadata($doi)
{
$response = $this->client->get("https://api.crossref.org/works/$doi");

if ($response->getStatusCode() === 200) {
$data = json_decode($response->getBody(), true);
return $this->extractMetadata($data);
}

return null;
}

protected function extractMetadata($data)
{
    
    
    // $abstract = str_replace(['<jats:p>', '</jats:p>'], '', );
      
    $metadata = [
    'title' => $data['message']['title'][0] ?? null,
    'url' => $data['message']['URL'] ?? null,
    'authors' => $data['message']['author'] ?? [],
    'publication_date' => $data['message']['issued']['date-parts'][0] ?? null,
    'journal_name' => $data['message']['container-title'][0] ?? null,

    'abstract' =>  $data['message']['abstract']?? null,
 


    'type' => $data['message']['type'] ?? null,
    'volume' => $data['message']['volume'] ?? null,
    'issue' => $data['message']['issue'] ?? null,
    'pdf_link' => $data['message']['link'][0]['URL'] ?? null, // Assuming the first link is the PDF link
    'ISSN'=>  $data['message']['ISSN'] ?? null,

    ];

return $metadata;
}
}