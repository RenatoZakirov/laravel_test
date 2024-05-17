<?php

// app/Http/Controllers/TemplateController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TemplateController extends Controller
{
    public function index()
    {
        // считываем шаблон с vue.js
        $html = File::get(resource_path('views/template.html'));
        // отправляем шаблон клиенту
        return response($html);
    }
}

