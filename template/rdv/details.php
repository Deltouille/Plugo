<div class="container">
    <article>
        <header><?= $data['details']->getTitle() ?></header>
        <?= $data['details']->getDetails() ?>
        <p><?= $data['details']->getDate() ?></p>
        <footer><?= $data['details']->getImportant() ?></footer>
    </article>
</div>