<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Collection\CollectionInterface $categorias
 * @var array $dadosGrafico
 */
?>

<div class="dashboard content">
    <h2>📊 Relatório de Categorias e Produtos</h2>

    <h3>Lista de Categorias e seus Produtos</h3>
    <table>
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Produtos</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria): ?>
                <tr>
                    <td><?= h($categoria->nome) ?></td>
                    <td>
                        <ul>
                            <?php foreach ($categoria->produtos as $produto): ?>
                                <li><?= h($produto->nome) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h3>📈 Gráfico de Pizza - Produtos por Categoria</h3>
    <canvas id="graficoPizza"></canvas>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('graficoPizza');
    const data = {
        labels: <?= json_encode(array_column($dadosGrafico, 'nome')) ?>,
        datasets: [{
            label: 'Produtos por Categoria',
            data: <?= json_encode(array_column($dadosGrafico, 'total_produtos')) ?>,
            backgroundColor: [
                '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'
            ],
            hoverOffset: 6
        }]
    };
    new Chart(ctx, {
        type: 'pie',
        data: data,
        options: {
            responsive: false,
        }
    });
</script>
