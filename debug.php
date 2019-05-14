
<form method="post" action="salle_update.php">
									<input type="hidden" name="id" value="1">
									<table style="width:100%">
									<tr><td>Nom de la salle </td><td><input type="text" name="nomsalle" value="allakaka"/></td></tr>
									<tr><td>Nombre de postes </td><td><input type="text" name="nbpostes" value="12"/></td></tr>
									<tr><td>Bâtiment </td><td><input type="text" name="batiment" value="1"/></td>
									</tr>
									<tr><td>Commentaires </td><td><input type="text" name="commentaire" value="NIMP"/></td></tr>									
									</table>
									
									<input type="submit" value="Mettre à jour les informations de" />
</form>

<form method="post" action="salle_update.php">
									<input type="hidden" name="id" value="<?echo($infosalle['id'];?>">
									<table style="width:100%">
									<tr><td>Nom de la salle </td><td><input type="text" name="nomsalle" value="<?php echo ($infosalle['nom']);?>"/></td></tr>
									<tr><td>Nombre de postes </td><td><input type="text" name="nbpostes" value="<?php echo ($infosalle['nbpostes']);?>"/></td></tr>
									<tr><td>Bâtiment </td><td>
										<select name="batiment">
											<?php 
												$reqbat = $bdd->query('SELECT * FROM batiment');
												while ($listbat = $reqbat->fetch()){
												?>
												<option value="<?php echo $listbat['id']; ?>" 
													<?php if($listbat['id']==$infosalle['idbatiment']){echo ('selected="selected"');}?> 
												><?php echo $listbat['nom']; ?></option>
												<?php
												}
												$reqbat->closeCursor(); // Termine le traitement de la requête
											?>
										</select>
									</td></tr>
									<tr><td>Commentaires </td><td><input type="text" name="commentaire" value="<?php echo ($infosalle['commentaire']);?>"/></td></tr>									
									</table>
									
									<input type="submit" value="Mettre à jour les informations de <?php echo ($infosalle['nom']);?>" />
</form>