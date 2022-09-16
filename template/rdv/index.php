<table role="grid">
    <thead>
        <th>
            <tr>
                <td>Titre</td>
                <td>Date</td>
                <td>important</td>
                <td>action</td>
            </tr>
        </th>
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
                    <div class="grid">
                        <a href="/index.php?page=details&id=<?= $currentRDV->getId() ?>" role="button" class="secondary">Details</a>
                        <a href="/index.php?page=remove_rdv&id=<?= $currentRDV->getId() ?>" role="button" class="contrast">Supprimer</a>
                        <a href="/index.php?page=update_rdv&id=<?= $currentRDV->getId() ?>" role="button" class="contrast">Modifier</a>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
    
