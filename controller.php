<?php

include_once "view.php";

class Controller
{
    public function do_register()
    {
        $template = "register.view";
        return View::render_view($template);
    }

    public function do_login()
    {
        $template = "login.view";
        return View::render_view($template);
    }

    public function do_not_found()
    {
        $template = "not_found.view";
        return View::render_view($template);
    }
}