
<nav class= "navbar">
        <form action="index.php" method="post" >
            <ul class="navul">
                    <?php
                    session_start();
                // balise php avec la condition de reconnaisance du profil user
                if(isset($_SESSION['user'])){
                    echo('<li class="navli"><a href="index.php">Accueil</a></li>');
                    echo ('<li class="navli"><a href="reservation-form.php">Formulaire</a></li>');
                    echo('<li class="navli"><a href="planning.php">Planning</a></li>');
                    echo ('<li class="navli"><a href="profil.php">Profil</a></li>');
                    echo('<li class="navli"><a href="https://github.com/laura-scognamiglio/reservation-salles" target="_blank">Git</a></li>
                    ');
                    echo ('<li class="libtndeco"><button class="deco" type="submit" name="deco" >X</button></li>');
                    // destruction de la session si bouton deconnexion enclencher
                    if(isset($_POST['deco'])){ 
                        session_destroy();
                        header('Location:index.php');
                    }
                }else{
                    echo('<li class="navli"><a href="index.php">Accueil</a></li>');
                    echo ('<li class="navli"><a href="connexion.php">Connexion</a></li>');
                    echo ('<li class="navli"><a href="inscription.php">Inscription</a></li>');
                    echo('<li class="navli"><a href="planning.php">Planning</a></li>');
                    echo('<li class="navli"><a href="https://github.com/laura-scognamiglio/reservation-salles" target="_blank">Git</a></li>
                    ');

                }
                 
                ?>

            </ul>
        </form>
 </nav>
  