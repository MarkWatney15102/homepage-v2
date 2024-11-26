<?php

namespace App\lib\View;

use Illuminate\View\View;

final class ViewLoader
{
    public function load(string $viewName, array $params = []): View
    {
        $viewHtml = view($viewName, $params)->render();

        $systemParams = [
            "_APP_NAME" => 'Eike Eric Wientjes',
            'html' => $viewHtml,
        ];

        return view(
            'layout',
            $systemParams
        );
    }
}
