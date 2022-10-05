<div class="container">
    <?php if(!empty($data['message'])) { ?>
        <div class="alert"><?=$data['message']?></div>
    <?php } ?>
    <form action="" method="post">
        
        <!-- Markup example 2: input is after label -->
        <label for="email">Adresse Email</label>
        <input type="email" id="email" name="email" placeholder="Email address" required>

        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" minlength="8" required>

        <label for="passwordVerif">Confirmation du mot de passe</label>
        <input type="password" id="passwordVerif" name="passwordVerif" minlength="8" required>

        <!-- Button -->
        <button type="submit">Valider</button>
    </form>
</div>