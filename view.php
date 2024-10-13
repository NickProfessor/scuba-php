<?php

class View
{
    public static function render_view($template)
    {
        return file_get_contents(VIEW_FOLDER . $template);
    }
}