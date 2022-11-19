<div class="overflow-x-auto">
    <table class="table text-center w-full">
        <thead>
        <tr>
            <th>Titre</th>
            <th>Date</th>
            <th>Important</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($data['allRDV'] as $currentRDV) { ?>
            <tr>
                <td>
                    <?= $currentRDV->getTitle() ?>
                </td>
                <td>
                    <?= $currentRDV->getDate() ?>
                </td>
                <td>
                    <?= $currentRDV->getImportant() == 1 ? 'Oui' : 'Non' ?>
                </td>
                <td>
                    <div class="btn-group btn-group-vertical">
                        <a href="/index.php?page=details&id=<?= $currentRDV->getId() ?>" role="button" class="btn btn-active">Details</a>
                        <a href="/index.php?page=remove_rdv&id=<?= $currentRDV->getId() ?>" role="button" class="btn">Supprimer</a>
                        <a href="/index.php?page=update_rdv&id=<?= $currentRDV->getId() ?>" role="button" class="btn">Modifier</a>
                    </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>