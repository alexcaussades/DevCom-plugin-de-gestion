<?php
/*
Plugin Name: Devcom communauté admin
Plugin URI: http://devcomrp.fr
Description: plugin de gestion de la communauté...
Version: 1.0
Author: Alexandre Caussades
Author URI: http://devcomrp.fr
License: GPL2
*/



add_action('admin_menu', 'devcomMenus' );

function devcomMenus()
{
	add_menu_page('devcomadmin', 'DevCom Admin', 'activate_plugins', 'decom-pannel', 'render_pannel', null, 81);
	add_submenu_page('decom-pannel', 'Gestion', 'Gestion Membres', 'activate_plugins', 'devcomadmin-secondary-page', 'gestionMembres');
}

 

function render_pannel()
/*
	pages d'acceuil du back office
 */
{
	global $current_user; // global user
	global $user_login;
	global $user_data;
	
	/*
		Variables de la Pages
	 */
	
	$devcomVariableVersion = '1.0'; //Affichage de la version
	$devcomimage = plugins_url('devcom/images/icon.png'); //Affichage de limage
	$devcomtitre = 'DevCom Panel Admin !'; //Titre de la page
	$user_info = $user_data;
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
			<?= AddPlayers(); //ajout de Membre ?>
			<br /> 
			<?= ModPlayers(); //ajout de moderation ?>
			<br />
			<?= SuppPlayers(); //ajout de support ?>
			<br />
			<?= BanPlayers(); //ajout de ban ?> 
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

function gestionMembres()
{

}


function AddPlayers()
{
			global $current_user;

			if (isset($_GET['devcom_option_pseudo']) AND isset($_GET['devcom_option_discord']) AND isset($_GET['devcom_option_steamid']) AND isset($_GET['devcom_option_user_id']))

			
	?>
	    <table cellspacing="0" class="widefat options-table">
					<thead>
					<tr>
						<th><strong> Add Players :</strong></th>
					</tr>
					</thead>
					<tbody>
						<td>
			<form method="get" action="">
    	 	<label><b>Pseudo : </b></label>
			<input type="text" name="devcom_option_pseudo" id="pseudo">
			<label><b>Discord : </b></label>
			<input type="text" name="devcom_option_discord" id="discord">
			<label><b>steamid : </b></label>
			<input type="text" name="devcom_option_steamid" id="steamid" minlength="15" maxlength="18">
			<input type="hidden" name="devcom_option_user_id" value="<?= $current_user->user_login ?>">
			<input type="submit" name="devcom_AddPlayers" class="button-primary autowidth" value="Envoyer">
    	 </form></td>
					</tbody>
		</table>
    <?php 
}

function ModPlayers()
{
	?>
	    <table cellspacing="0" class="widefat options-table">
					<thead>
					<tr>
						<th><strong> Modération Players :</strong></th>
					</tr>
					</thead>
					<tbody>
						<td>
			<form method="get" action="">
    	 	<label><b>Pseudo : </b></label>
			<input type="text" name="option[pseudo]" id="pseudo">
			<label><b>Discord : </b></label>
			<input type="text" name="option[discord]" id="discord">
			<label><b>steamid : </b></label>
			<input type="text" name="option[steamid]" id="steamid">
			<input type="submit" name="devcom_AddPlayers" class="button-primary autowidth" value="Envoyer">
    	 </form></td>
					</tbody>
				</table>
    <?php 
}

function SuppPlayers()
{
	?>
	    <table cellspacing="0" class="widefat options-table">
					<thead>
					<tr>
						<th><strong> Support Players :</strong></th>
					</tr>
					</thead>
					<tbody>
						<td>
			<form method="get" action="">
    	 	<label><b>Pseudo : </b></label>
			<input type="text" name="option[pseudo]" id="pseudo">
			<label><b>Discord : </b></label>
			<input type="text" name="option[discord]" id="discord">
			<label><b>steamid : </b></label>
			<input type="text" name="option[steamid]" id="steamid">
			<input type="submit" name="devcom_AddPlayers" class="button-primary autowidth" value="Envoyer">
    	 </form></td>
					</tbody>
				</table>
    <?php 
}

function BanPlayers()
{
	?>
	    <table cellspacing="0" class="widefat options-table">
					<thead>
					<tr>
						<th><strong> Ban Players :</strong></th>
					</tr>
					</thead>
					<tbody>
						<td>
			<form method="get" action="">
    	 	<label><b>Pseudo : </b></label>
			<input type="text" name="option[pseudo]" id="pseudo">
			<label><b>Discord : </b></label>
			<input type="text" name="option[discord]" id="discord">
			<label><b>steamid : </b></label>
			<input type="text" name="option[steamid]" id="steamid">
			<input type="submit" name="devcom_AddPlayers" class="button-primary autowidth" value="Envoyer">
    	 </form></td>
					</tbody>
				</table>
    <?php 
}