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
							foreach($results as $posts) {
								$row = "<tr><td>".$posts['id']."</td>";
								$row .= "<td>".$posts['title']."</td>";
								$row .= "<td>".$posts['date_created']."</td>";
								$row .= "<td>".$posts['date_updated']."</td>";
								$row .= "<td>".$posts['pages_id']."</td>";
								$row .= "<td>	<a href='".ABSOLUTE_PATH_BACK."articles/edit/".$posts['id']."' class='edit' title='Editer l'article'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
												<a href='".ABSOLUTE_PATH_BACK."articles/delete/".$posts['id']."' class='delete' title='Supprimer l'article'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
										</td></tr>";
								echo $row;
							}
						}
					?>

                </table>
            </div> <!-- exemple - ligne 2 -->
        </div>
    </div>
