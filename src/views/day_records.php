<main class="content">
    <?php
        renderTitle(
            'Registrar ponto',
            'Mantenha seu ponto consistente!',
            'icofont-check-alt'
        );
        include(TEMPLATE_PATH . "/menssages.php"); //mostra eventuais menssagens de sucesso ou não
    ?>
    <div class="card">
        <div class="card-header">
            <h3><?= $today ?></h3>
            <p class="mb-0">Os batimentos efetuados hoje</p>
        </div>
        <div class="card-body">
            <div class="d-flex m-5 justify-content-around"> <!-- d-flex: habilita o flaxbox; hustfy-con...: atribui o justfy content nas tags filhas -->
                <span class="record">Entrada 1: ---</span>
                <span class="record">Saída 1: ---</span>
            </div>
            <div class="d-flex m-5 justify-content-around"> <!-- d-flex: habilita o flaxbox; hustfy-con...: alinha os itens com todo espaço disponível -->
                <span class="record">Entrada 2: ---</span>
                <span class="record">Saída 2: ---</span>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-center">
            <a href="???" class="btn btn-success btn-lg">
                <i class="icofont-check mr-1"></i>
                Bater o ponto
            </a>
        </div>
    </div>
</main>