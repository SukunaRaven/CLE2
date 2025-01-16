<?php
session_start();
?>
<nav class="navbar has-background-info" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item">
            <figure class="image is-32x32">
                <a href="../homepage.php" target="_self"><img class="is-rounded" src="../Images/BroersLogo.png"
                                                              alt="Logo"/></a>
            </figure>
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="nav-bar">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <script>
                document.addEventListener('DOMContentLoaded', () => {

                    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

                    $navbarBurgers.forEach(el => {
                        el.addEventListener('click', () => {

                            const target = el.dataset.target;
                            const $target = document.getElementById(target);

                            el.classList.toggle('is-active');
                            $target.classList.toggle('is-active');

                        });
                    });

                });
            </script>
        </a>
    </div>

    <div class="navbar-menu" id="nav-bar">
        <div class="navbar-end">
            <a href="../menu.php" class="navbar-item is-link">
                Ons Menu
            </a>

            <a href="../reserveringen.php" class="navbar-item is-link">
                Reserveer
            </a>

            <a href="../contact.php" class="navbar-item is-link">
                Contact
            </a>

            <a href="../users.php" class="navbar-item is-link">
                Users
            </a>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Meer
                </a>

                <div class="navbar-dropdown">
                    <a href="../aanbod.php" class="navbar-item">
                        Ons Aanbod
                    </a>
                    <a href="../evenementen.php" class="navbar-item">
                        Onze Evenementen
                    </a>
                    <a href="../arrangementen.php" class="navbar-item">
                        Onze Arrangementen
                    </a>
                    <a href="../reviewspage.php" class="navbar-item">
                        Reviews
                    </a>
                </div>
            </div>
        </div>
        <?php if (isset($_SESSION['admin_flag']) && $_SESSION['admin_flag'] == 1) { ?>
        <div class="buttons">
            <a href="../admin.php" class="button is-primary is-outlined">
                Admin
            </a>
        </div>
        <?php } elseif (!empty($_SESSION)) { ?>
            <div class="buttons">
                <a href="../logout.php" class="button is-primary is-outlined">
                    Log Uit
                </a>
            </div>
        <?php } else { ?>
            <div class="buttons">
                <a href="../login.php" class="button is-link is-outlined">
                    Log In
                </a>
            </div>
        <?php } ?>

    </div>

</nav>
