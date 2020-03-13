<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\NewsParsing;
use App\Parser;
use App\ParserMail;
use App\ParserYandex;
use App\Resources;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParserController extends Controller
{
    public function index(Parser $parser)
    {
        $resLinks = Resources::all();

        foreach ($resLinks as $link) {
//            $parser->parser($link);
            NewsParsing::dispatch($link->link);
        }

        return redirect()->route('admin.index')->with('success', 'Парсер успешно поставлен в очередь!');
    }
}
