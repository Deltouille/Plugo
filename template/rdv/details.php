<div class="card w-96 bg-base-100 shadow-xl mx-auto">
    <div class="card-body">
        <h2 class="card-title"><?= $data['details']->getTitle() ?></h2>
        <p>Description : <?= $data['details']->getDetails() ?></p>
        <p>Date : <?= $data['details']->getDate() ?></p>
        <p>Important : <?= $data['details']->getImportant() ? 'Oui' : 'Non'  ?></p>
        <div class="card-actions justify-end">
            <a href="/index.php?page=remove_rdv&id=<?= $data['details']->getId() ?>" class="btn btn-error">Supprimer</a>
        </div>
    </div>
</div>

