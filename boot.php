<?php

if(rex::isDebugMode()) {
    rex_extension::register('MEDIA_ADDED', ['indexnow','publishMedia']);
    rex_extension::register('MEDIA_UPDATED', ['indexnow','updateMedia']);
    rex_extension::register('MEDIA_DELETED', ['indexnow','removeMedia']);
    rex_extension::register('ART_ADDED', ['indexnow','publishArticle']);
    rex_extension::register('ART_UPDATED', ['indexnow','updateArticle']);
    rex_extension::register('ART_DELETED', ['indexnow','removeArticle']);
}
