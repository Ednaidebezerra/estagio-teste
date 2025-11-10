<?php
declare(strict_types=1);

namespace App\Controller;

class DashboardController extends AppController
{
    public function index()
    {
        // Carrega os modelos
        $this->loadModel('Categorias');
        $this->loadModel('Produtos');

        // Busca todas as categorias com seus produtos
        $categorias = $this->Categorias->find()
            ->contain(['Produtos'])
            ->all();

        // Conta quantos produtos há em cada categoria
        $dadosGrafico = [];
        foreach ($categorias as $categoria) {
            $dadosGrafico[] = [
                'nome' => $categoria->nome,
                'total_produtos' => count($categoria->produtos),
            ];
        }

        $this->set(compact('categorias', 'dadosGrafico'));
    }
}

