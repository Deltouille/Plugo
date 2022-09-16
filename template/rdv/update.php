<div class="container">
    <form action="/index.php?page=update_rdv" method="POST">
        <input type="text" value="<?= $data['ID'] ?>" name="id" id="id" hidden>
        <!-- Grid -->
        <div class="grid">
            <!-- Markup example 1: input is inside label -->
            <label for="titre">
                Titre
                <input type="text" id="title" name="title" placeholder="title" required value="<?= $data['rdv']->getTitle() ?: '' ?>">
            </label>

            <label for="details">
                Details
                <input type="text" id="details" name="details" placeholder="details" required value="<?= $data['rdv']->getDetails() ?: '' ?>">
            </label>
        </div>
        <div class="grid">
            <!-- Markup example 1: input is inside label -->
            <label for="date">
                date
                <input type="datetime-local" id="date" name="date" required value="<?= $data['rdv']->getDate() ?: '' ?>">
            </label>

            <label for="important">
                important
                <input type="checkbox" id="important" name="important" placeholder="important" <?= $data['rdv']->getImportant() == 1 ? 'checked' : "" ?>>
            </label>
        </div>
        
        <!-- Button -->
        <button type="submit">
            Submit
        </button>
    </form>
</div>