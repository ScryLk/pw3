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
            'arquivos' => 'uploaded[arquivos]|max_size[arquivos,2048]|ext_in[arquivos,jpg,jpeg,png,pdf]',
            'perfil' => 'uploaded[perfil]|max_size[perfil,2048]|ext_in[perfil,jpg,jpeg,png]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $nomesArquivos = [];


        $name = $request->getPost('name');
        $email = $request->getPost('email');
        $message = $request->getPost('message');


        $arquivos = $this->request->getFileMultiple('arquivos');
        if (!$arquivos) {
            return redirect()->back()->with('errors', ['Nenhum arquivo foi enviado.']);
        }

        $perfil = $this->request->getFile('perfil');
        if (!$perfil) {
            return redirect()->back()->with('errors', ['Nenhuma foto de perfil foi enviada.']);
        }

        $nomesArquivos = [];

        foreach ($arquivos as $arquivo) {
            if ($arquivo->isValid() && !$arquivo->hasMoved()) {
                $novoNome = time() . '_' . $arquivo->getRandomName();
                $arquivo->move(FCPATH . 'uploads/', $novoNome);
                $nomesArquivos[] = $novoNome;
            }
        }
        if ($perfil->isValid() && !$perfil->hasMoved()) {
            $novoNomePerfil = time() . '_' . $perfil->getRandomName();
            $perfil->move(FCPATH . 'uploads/', $novoNomePerfil);
        
        }


        // Exibir mensagem de sucesso (ou implementar o envio de e-mail por exemplo)

        return redirect()->back()->with('success', 'Mensagem enviada com sucesso!')->with('arquivos', $nomesArquivos)->with('perfil', $novoNomePerfil);

    }

}
