<?php

namespace App;

use Orchestra\Parser\Xml\Facade as XmlParser;

class Parser
{
    public function parser($link)
    {
        $xml = XmlParser::load($link);
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate]']
        ]);

        $category = $this->addCategory($data);
        $this->addNews($data, $category->id);
    }

    /**
     * Add News
     * @param array $data
     * @param $category_id
     */
    public function addNews(array $data, $category_id)
    {
        foreach ($data['news'] as $item) {
            if (!News::query()->where(['title' => $item['title']])->first()) {
                $news = new News();
                $news->fill([
                    'category_id' => $category_id,
                    'title' => $item['title'],
                    'text' => $item['description']
                ]);
                $news->save();
            }
        }
    }

    /**
     * Add Category
     * @param array $data
     * @return Category
     */
    public function addCategory(array $data)
    {
        $category = Category::query()->where(['title' => $data['title']])->first();
        if (!$category) {
            $category = new Category();
            $category->fill([
                'title' => $data['title'],
                'name' => $data['title']
            ]);
            $category->save();
        }

        return $category;
    }
}
