<div class="container">
    <form action="/index.php?page=add_rdv" method="POST" enctype="multipart/form-data">
        <input type="text" value="<?= $_GET['ID'] ?>" name="id" id="id" hidden>
        <!-- Grid -->
        <div class="grid">
            <!-- Markup example 1: input is inside label -->
            <label for="titre">
                Titre
                <input type="text" id="title" name="title" placeholder="title" required>
            </label>

            <label for="details">
                Details
                <input type="text" id="details" name="details" placeholder="details" required>
            </label>
        </div>
        <div class="grid">
            <!-- Markup example 1: input is inside label -->
            <label for="date">
                date
                <input type="datetime-local" id="date" name="date" required>
            </label>

            <label for="important">
                important
                <input type="checkbox" id="important" name="important" placeholder="important">
            </label>
        </div>

        <div class="grid">
            <input type="file" name="file">
        </div>
        
        <!-- Button -->
        <button type="submit">
            Submit
        </button>
    </form>
</div>