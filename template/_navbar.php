<header>
    <nav class="navbar bg-primary">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
                </label>
            </div>
            <a class="btn btn-ghost normal-case text-xl">Plugo</a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal p-0">
                <li><a href="index.php?page=home">Accueil</a></li>
                <li><a href="index.php?page=mentionLegal">Mention Legales</a></li>
                <li><a href="index.php?page=add_rdv">Ajouter un rendez-vous</a></li>
                <li><a href="index.php?page=all_rdv">Tout les rendez vous</a></li>
                <?php if(!isset($_SESSION['user'])){ ?>
                    <li><a href="index.php?page=user_register">S'enregistrer</a></li>
                    <li><a href="index.php?page=user_login">Se connecter</a></li>
                <?php }else{ ?>
                    <li><a href="index.php?page=user_logout">Deconnexion</a></li>
                <?php } ?>
            </ul>
        </div>
        <?php if(isset($_SESSION['user'])){ ?>
            <div class="navbar-end">
                <a href="index.php?page=user_profile" class="btn">Mon Profil</a>
            </div>
        <?php } ?>
    </nav>
</header>