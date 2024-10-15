<?php



class Controller
{
    public function do_register()
    {
        if (isset($_POST['person'])) {
            if (Validation::verifyPasswordMatch($_POST['person']['password'], $_POST['person']['password-confirm'])) {
                unset($_POST['person']['password-confirm']);
            } else {
                header("Location: /scuba-php/?page=register&&erro=senhas-nao-conferem");
                exit();
            }
            if (!(Validation::isPasswordLengthValid($_POST['person']['password']))) {
                header("Location: /scuba-php/?page=register&&erro=senha-invalida");
                exit();
            }
            if (Validation::emailExists($_POST['person']['email'])) {
                header("Location: /scuba-php/?page=register&&erro=email-ja-cadastrado");
                exit();
            } else {
                Crud::crud_create($_POST);
                header("Location: /scuba-php/?page=login&&sucesso=cadastrado");
                exit();
            }
        }
        $template = "register.view";
        if (isset($_GET['erro'])) {
            switch ($_GET['erro']) {
                case "email-ja-cadastrado":
                    $mensagemErro = "Email já possui cadastro";
                    break;
                case "senha-invalida":
                    $mensagemErro = "Erro na senha. Tente uma senha com pelo menos 10 dígitos";
                    break;
                case "senhas-nao-conferem":
                    $mensagemErro = "Erro na senha. As senhas não conferem";
                    break;
            }
            return View::render_view($template, ['mensagemErro' => $mensagemErro]);
        }
        return View::render_view($template);
    }

    public function do_login()
    {
        $template = "login.view";
        if (isset($_GET['sucesso'])) {
            $mensagemSucesso = "Usuário cadastrado com sucesso";
            return View::render_view($template, ['mensagemSucesso' => $mensagemSucesso]);
        }
        return View::render_view($template);
    }

    public function do_not_found()
    {
        $template = "not_found.view";
        return View::render_view($template);
    }
}