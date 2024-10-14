<?php



class Controller
{
    public function do_register()
    {
        if (isset($_POST['person'])) {
            unset($_POST['person']['password-confirm']);
            Crud::crud_create($_POST);
            header("Location: /scuba-php/?page=login");
        }
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