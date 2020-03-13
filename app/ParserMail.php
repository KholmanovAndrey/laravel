<?php

namespace App;

use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserMail extends Parser
{
    public function parser()
    {
        $xml = XmlParser::load("https://news.mail.ru/rss/politics/");
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,description]']
        ]);

        return $data;
    }
}
