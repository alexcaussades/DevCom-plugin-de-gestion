<?php
/*
Plugin Name: Devcom communauté admin
Plugin URI: http://devcomrp.fr
Description: plugin de gestion de la communauté...
Version: 1.0.2
Author: Alexandre Caussades
Author URI: http://devcomrp.fr
License: Sous droit d'auteur Alexandre Caussades <alexcaussades (at) gmail.com>
*/


add_action('admin_menu', 'devcomMenus' );

function devcomMenus()
{
	add_menu_page('devcomadmin', 'DevCom Admin', 'activate_plugins', 'decom-pannel', 'render_pannel', null, 81);
	add_submenu_page('decom-pannel', 'Gestion', 'Gestion Membres', 'activate_plugins', 'devcomadmin-secondary-page', 'gestionMembres');
	add_submenu_page( 'decom-pannel', 'Ajout', 'Ajout Membres', 'activate_plugins', 'devcomadmin-addMembre', 'addMembres' );
	add_submenu_page( 'decom-pannel', 'option', 'Option', 'activate_plugins', 'devcomadmin-option', 'devcomoption' );
}



/*

*******************************************************************************
							les pages dans le Back Office
*******************************************************************************

 */



function render_pannel()
/*
	pages d'acceuil du back office
 */
{
	global $current_user; // info user
	global $user_login; //  Info login
	require_once 'variable.php';
			
?>
<!-- Visible de la page d'acceuil en bac office -->
<div class="wrap theme-options-page">

<center><img src="<?= $devcomimage ?>" alt="Logo Devcom" title="Devcom Logo"></center>

<h1><strong><?= $devcomtitre; ?></strong></h1> 
Version du plugin: <strong><?= $devcomVariableVersion; ?></strong>

		<div>
    	 <h2>Bienvenue <strong><?= $current_user->user_login ?></strong></h2>
    	 <p>Votre rôle sur le systeme est de : <strong><?= $current_user->user_level ?></strong></p>
    	 <br />
    	 <br />
		</div>
			
			
</div>

<!-- fin de la page d'acceuil du bac office -->
<?php
}

function recherche()
{
	?>
	<div class="widfat options-table">	
		<form method="get" action="">
    	 	<label><b>Recherche : </b></label>
			<input type="text" name="option[pseudo]" id="pseudo">
			<input type="submit" name="devcom_recherche" class="button-primary autowidth" value="Envoyer">
    	 </form>
    </div>
    <?php 
}

/*

Tableau de la gestion des membres du syteme
@param "wp_devcom"
pages getion membres
A Faire la mise en forme documents

 */
function gestionMembres()
{

global $wpdb;

$requete = "SELECT * FROM wp_devcom";
$resultat = $wpdb->get_results( $requete );

$erreurSql = $wpdb->last_error;

if ( $erreurSql == "" ) {

   if ( $wpdb->num_rows > 0 ) {

      ?>

      <table class="...">

        
         <tbody>

         <?php

         foreach( $resultat as $enreg ) {

            echo "<tr>";

            echo "<td>$enreg->id</td>";
            
            echo "<td>$enreg->devcom_option_pseudo</td>";

            echo "<td>$enreg->devcom_option_discord</td>";

            echo "<td>$enreg->devcom_option_comments</td>";

            echo "</tr>";

         } 

         ?>

         </tbody>

      </table>

      <?php

   } else {

      echo  __( "Aucune donnée ne correspond aux critères demandés." );

   }

} else {

   echo  __( "Oups ! Un problème a été rencontré." );

   // afficher l'erreur à l'écran seulement si on est en mode débogage

   montheme_echo_debug( $erreurSql );

}
}

function addMembres()
{
 echo AddPlayers();
}

function devcomoption()
{


}

/*

*******************************************************************************
							Appel des functions des pages 
*******************************************************************************
 */



function AddPlayers()
{
			global $current_user;
			require_once 'variable.php';

if(isset($_POST['devcom_option_pseudo']) AND isset($_POST['devcom_option_discord']) AND isset($_POST['devcom_option_steamid']) AND isset($_POST['devcom_option_user_id']))
{

				$devcom_option_pseudo  = htmlspecialchars($_POST['devcom_option_pseudo']);
				$devcom_option_discord = htmlspecialchars($_POST['devcom_option_discord']);
				$devcom_option_steamid = htmlspecialchars($_POST['devcom_option_steamid']);
				$devcom_option_user_id = htmlspecialchars($_POST['devcom_option_user_id']);
				$devcom_option_comments = htmlspecialchars($_POST['devcom_option_comments']);
				
				global $wpdb;          
                                    
           $wpdb->insert("wp_devcom", array(
						'devcom_option_pseudo'   => $devcom_option_pseudo, 
						'devcom_option_discord'  => $devcom_option_discord,
						'devcom_option_steamid'  => $devcom_option_steamid,
						'devcom_option_user_id'  => $devcom_option_user_id,
						'devcom_option_comments' => $devcom_option_comments
						));
           ?>
           <div id="message" class="updated fade">
           		<p><strong>Entrée sauvegarder </stong></p>
           </div>
           <?}
?><center><img src="<?= $devcomimage; ?>" alt="Logo Devcom" title="Devcom Logo"></center><?
			
			global $wpdb;
			$user_count = $wpdb->get_var( "SELECT COUNT(*) FROM wp_devcom" );
			echo "<p><b>Nous sommes: ". $user_count ."</b></p>";

	?>
	    <table cellspacing="0" class="widefat options-table">
					<thead>
					<tr>
						<th><strong> Add Players :</strong></th>
					</tr>
					</thead>
					<tbody>
			<td>
			<form method="post" action="" style='width: 100%; height: 100%'>
    	 	<label><b>Pseudo : </b></label>
			<input type="text" name="devcom_option_pseudo" id="pseudo" placeholder="Mettre le pseudo (RP)" style="width: 100%; height: 100%"><br />

			<label><b>Discord : </b></label>
			<input type="text" name="devcom_option_discord" id="discord" placeholder="Mettre le pseudo Discord" style="width: 100%; height: 100%"><br />

			<label><b>steamid : </b></label>
			<? /* Steamid de valeur de 17 caratere blocage du systeme */ ?>
			<input type="text" name="devcom_option_steamid" id="steamid" minlength="17" maxlength="17" placeholder="76561198027438386" style="width: 100%; height: 100%"><br />

			<label><b>Commentaire : </b></label><br />
			<textarea name="devcom_option_comments" id="commentaire" placeholder="Quelque chose à nous dire !" style="width: 100%; height: 100%"></textarea><br />

			<? /* Récupère le pseudo de l'utilisateur qui effectue la manipulation   */ ?>
			<input type="hidden" name="devcom_option_user_id" value="<?= $current_user->user_login ?>">

			<input type="submit" name="devcom_AddPlayers" class="button-primary autowidth" value="Envoyer"><br />
    	 </form></td>
			</tbody>
		</table>
    <?php 
}

function ModPlayers()
{
	
}

function SuppPlayers()
{
	
}

function BanPlayers()
{
	
}