<?php

namespace App\Services;

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Blob\Models\CreateBlockBlobOptions;

//class AzureBlobService
//{
//    protected $blobClient;
//    protected $containerName;
//
//    Public function __construct(){
//        $connectionString = "DefaultEndpointsProtocol=https;AccountName=".getenv('AZURE_STORAGE_NAME') .
//            ";AccountKey=" . env('AZURE_STORAGE_KEY') . ";EndpointSuffix=core.windows.net";
//
//        $this->blobClient = BlobRestProxy::createBlobService($connectionString);
//        $this->containerName = env('AZURE_STORAGE_CONTAINER');
//    }
//
//    Public function uploadFile(string $file, string $blobName){
//        $content = fopen($file,  'r');
//        $options = new CreateBlockBlobOptions();
//        $options->setContentType($file);
//        $this->blobClient->createBlockBlob($this->containerName, $blobName, $content, $options);
//
//        return "https://".env('AZURE_STORAGE_NAME').".blob.core.windows.net/{$this->containerName}/{$blobName}";
//    }
//}
