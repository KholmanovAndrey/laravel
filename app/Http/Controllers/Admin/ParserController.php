<?php

namespace App\Http\Controllers\Admin;

use App\ParserMail;
use App\ParserYandex;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParserController extends Controller
{
    public function index()
    {
        $parser = new ParserYandex();
        $dataArray[] = $parser->parser();
        $parser = new ParserMail();
        $dataArray[] = $parser->parser();

        foreach ($dataArray as $data) {
            $category = $parser->addCategory($data);
            $parser->addNews($data, $category->id);
        }

        return redirect()->route('admin.index')->with('success', 'Парсер проведен успешно!');
    }
}
