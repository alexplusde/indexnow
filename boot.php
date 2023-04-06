<?php

if(rex::isDebugMode()) {


    // https://github.com/yakamara/redaxo_yrewrite/blob/e10cd337e2685a9eb649494e29d21bcdb174f725/boot.php#L35-L50
    $extensionPoints = [
        'CAT_ADDED',   'CAT_UPDATED',   'CAT_DELETED', 'CAT_STATUS',  'CAT_MOVED',
        'ART_ADDED',   'ART_UPDATED',   'ART_DELETED', 'ART_STATUS',  'ART_MOVED', 'ART_COPIED',
        'ART_META_UPDATED', 'ART_TO_STARTARTICLE', 'ART_TO_CAT', 'CAT_TO_ART',
        /* 'CLANG_ADDED', */ 'CLANG_UPDATED', /* 'CLANG_DELETED', */
        /* 'ARTICLE_GENERATED' */
        // 'ALL_GENERATED'
    ];

    rex_extension::register('MEDIA_ADDED', ['indexnow','publishMedia']);
    rex_extension::register('MEDIA_UPDATED', ['indexnow','updateMedia']);
    rex_extension::register('MEDIA_DELETED', ['indexnow','removeMedia']);
    rex_extension::register('ART_ADDED', ['indexnow','publishArticle']);
    rex_extension::register('ART_UPDATED', ['indexnow','updateArticle']);
    rex_extension::register('ART_PRE_DELETED', ['indexnow','removeArticle']);
}
