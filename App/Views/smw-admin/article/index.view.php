<?php
include(dirname(__DIR__).'/header.php');
include(dirname(__DIR__).'/menu_gauche.tpl.php');
?>

    <div class="container">
        <div class="row"> <!-- exemple - ligne 1 -->
            <div class="col-10 title">
                <h2>Tous mes articles</h2>
            </div>
        </div>
        <div class="row"> <!-- exemple - ligne 2 -->
            <div class="col-10 col-offset-1">
                <table class="form-group">
                    <tr>
                        <th>#id</th>
                        <th>Nom de l'article</th>
                        <th>Créer le</th>
                        <th>Modifier le</th>
                        <th>Page attaché</th>
                        <th>Action</th>
                    </tr>

					<?php 
						if(isset($results) && $results!==false) {
							foreach($results as $post) {
								$row = "<tr><td>".$post['id']."</td>";
								$row .= "<td>".$post['title']."</td>";
								$row .= "<td>".$post['date_created']."</td>";
								$row .= "<td>".$post['date_updated']."</td>";
								$row .= "<td>".$post['pages_id']."</td>";
								$row .= "<td>	<a class='edit' title='Editer l'article'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
												<a href='".ABSOLUTE_PATH."articles/delete/".$post['id']."' class='delete' title='Supprimer l'article'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
										</td></tr>";
								echo $row;
							}
						}
					?>

                    <!-- Exemple :
						<tr>
							<td>1</td>
							<td>Test</td>
							<td>Yesterday</td>
							<td>Today</td>
							<td>Aucune</td>
							<td><a class="edit" title="Editer l'article"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								<a class="delete" title="Supprimer l'article"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Slt</td>
							<td>Yesterday</td>
							<td>Today</td>
							<td>Aucune</td>
							<td><a class="edit" title="Editer l'article"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								<a class="delete" title="Supprimer l'article"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<td>3</td>
							<td>C'est cool</td>
							<td>Yesterday</td>
							<td>Today</td>
							<td>Aucune</td>
							<td><a class="edit" title="Editer l'article"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								<a class="delete" title="Supprimer l'article"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<td>4</td>
							<td>C'est cool</td>
							<td>Yesterday</td>
							<td>Today</td>
							<td>Aucune</td>
							<td><a class="edit" title="Editer l'article"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								<a class="delete" title="Supprimer l'article"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<td>5</td>
							<td>C'est cool</td>
							<td>Yesterday</td>
							<td>Today</td>
							<td>Aucune</td>
							<td><a class="edit" title="Editer l'article"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								<a class="delete" title="Supprimer l'article"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							</td>
						</tr> 
					-->
                </table>
            </div> <!-- exemple - ligne 2 -->
        </div>
    </div>

<?php
include(dirname(__DIR__).'/footer.php');