<?php

class rex_api_indexnow extends rex_api_function
{
    protected $published = true;

    public function execute()
    {

        // Artikel senden
        rex_request::cleanOutputBuffers();
        rex_request::sendContent(indexnow::getApiKey());
        exit();
    }
}
