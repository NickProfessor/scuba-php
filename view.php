<?php

class View
{
    public static function render_view($template, $dados = [])
    {
        extract($dados);

        include VIEW_FOLDER . $template;
    }
}