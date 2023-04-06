<?php
class indexnow extends \rex_socket
{
    /* Todo: https://developers.google.com/search/apis/indexing-api/v3/using-api?hl=de */

    /* Preconditions */
    public static function getApiKey() : ?string
    {
        return rex_config::get("indexnow", "apikey") ?? "";
    }

    public static function getKeyLocation() :string
    {
        return rex_yrewrite::getCurrentDomain()->getUrl() . '?rex-api-call=indexnow';
    }
    public static function getHost() :string
    {
        return rex_yrewrite::getCurrentDomain()->getUrl();
    }

    public static function getSocket($url)
    {
        return self::factoryUrl("https://www.bing.com/indexnow?url=".$url."&key=" . self::getApiKey($ep));
    }

    /* EPs */
    public static function publishMedia($ep)
    {
        $params = $ep->getParams();
        $socket = self::getSocket(rex_yrewrite::getFullUrlByArticleId($params['id'], $params['clang']));
        $socket->doPost(json_encode(['host' => self::getHost(), "key" => self::getApiKey(), 'keyLocation' => self::getKeyLocation()]));
    }
    public static function updateMedia($ep)
    {
        $params = $ep->getParams();
        $socket = self::getSocket(self::getHost().'/media/'.$params['filename']);
        $socket->doPost(json_encode(['host' => self::getHost(), "key" => self::getApiKey(), 'keyLocation' => self::getKeyLocation()]));
    }
    public static function removeMedia($ep)
    {
        $params = $ep->getParams();
        $socket = self::getSocket(self::getHost().'/media/'.$params['filename']);
        $socket->doPost(json_encode(['host' => self::getHost(), "key" => self::getApiKey(), 'keyLocation' => self::getKeyLocation()]));
    }
    public static function publishArticle($ep)
    {
        $params = $ep->getParams();
        if($params['status'] > -1) {
            $socket = self::getSocket(rex_yrewrite::getFullUrlByArticleId($params['id'], $params['clang']));
            $socket->doPost(json_encode(['host' => self::getHost(), "key" => self::getApiKey(), 'keyLocation' => self::getKeyLocation()]));
        }
        // dd($params, $ep, $socket);
    }
    public static function updateArticle($ep)
    {
        $params = $ep->getParams();
        if($params['status'] > 0) {
            $article = rex_article::get($params['id'], $params['clang']);
            $socket = self::getSocket(rex_yrewrite::getFullUrlByArticleId($params['id'], $params['clang']));
            $socket->doPost(json_encode(['host' => self::getHost(), "key" => self::getApiKey(), 'keyLocation' => self::getKeyLocation()]));
        }
        // dd($params, $ep, $socket);
    }
    public static function removeArticle($ep)
    {
        $params = $ep->getParams();
        if($params['status'] > 0) {
            $article = rex_article::get($params['id'], $params['clang']);
            $socket = self::getSocket(rex_yrewrite::getFullUrlByArticleId($params['id'], $params['clang']));
            $socket->doPost(json_encode(['host' => self::getHost(), "key" => self::getApiKey(), 'keyLocation' => self::getKeyLocation()]));
        }
        // dd($params, $ep, $socket);
    }
}
