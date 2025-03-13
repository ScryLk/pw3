<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function sobre(): string
    {
        return view('sobre');
    }

    public function contato(): string
    {
        return view('contato');
    }


    public function submitContact()
    {
        $request = service('request');

        // Validação básica dos campos
        $rules = [
            'name' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'O campo Nome é obrigatório.',
                    'min_length' => 'O Nome deve ter pelo menos {param} caracteres.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'O campo E-mail é obrigatório.',
                    'valid_email' => 'O E-mail deve conter o seguinte caracter especial: @'
                ]
            ],
            'message' => 'required|min_length[10]',
            'arquivo' => 'uploaded[arquivo]|max_size[arquivo,2048]|ext_in[arquivo,jpg,jpeg,png,pdf]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        

        $name = $request->getPost('name');
        $email = $request->getPost('email');
        $message = $request->getPost('message');

        $arquivo = $this->request->getFile('arquivo');

        if ($arquivo->isValid() && !$arquivo->hasMoved()) {
               $novoNome = $arquivo->getRandomName();
               $arquivo->move(WRITEPATH . 'uploads', $novoNome);
        }
   

        // Exibir mensagem de sucesso (ou implementar o envio de e-mail por exemplo)

        return redirect()->back()->with('success', 'Mensagem enviada com sucesso!');
    }

}
