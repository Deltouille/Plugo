<div class="card w-96 bg-base-100 shadow-xl mx-auto">
    <div class="card-body">
        <h2 class="card-title">Email : <?= $_SESSION['user']['email'] ?></h2>
        <p>Compte crée le : <?= $_SESSION['user']['created_at'] ?></p>
        <p>Compte modifié le : <?= $_SESSION['user']['updated_at'] ?></p>
    </div>
</div>