<?php
include(dirname(__DIR__).'/header.php');
include(dirname(__DIR__).'/menu_gauche.tpl.php');
?>

    <div class="container">
        <div class="row"> <!-- exemple - ligne 1 -->
            <div class="col-10 title">
                <h2>Toutes les pages</h2>
            </div>
        </div>
        <div class="row"> <!-- exemple - ligne 2 -->
            <div class="col-10 col-offset-1">
                <table class="form-group">
                    <tr>
                        <th>id</th>
                        <th>Nom de la page</th>
                        <th>Créer le</th>
                        <th>Modifier le</th>
                        <th>Pages attachées</th>
                        <th>Auteur</th>
                        <th>En ligne</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Test</td>
                        <td>Yesterday</td>
                        <td>Today</td>
                        <td>Aucune</td>
                        <td>Brixton</td>
                        <td title="Etat : non-publié, vous êtes la seule personne a voir cette page"><div id="user_inactive"></div></td>
                        <td><a class="edit" title="Editer la page"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a class="delete" title="Supprimer la page"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Accueil</td>
                        <td>Yesterday</td>
                        <td>Today</td>
                        <td>Accueil</td>
                        <td>jumk</td>
                        <td title="Etat : publié"><div id="user_active"></div></td>
                        <td><a class="edit" title="Editer la page"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a class="delete" title="Supprimer la page"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>bootstrap</td>
                        <td>Yesterday</td>
                        <td>Today</td>
                        <td>Aucune</td>
                        <td>onesie</td>
                        <td title="Etat : publié"><div id="user_active"></div></td>
                        <td><a class="edit" title="Editer la page"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a class="delete" title="Supprimer la page"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>ça marche</td>
                        <td>Yesterday</td>
                        <td>Today</td>
                        <td>Aucune</td>
                        <td>sinicha</td>
                        <td title="Etat : publié"><div id="user_active"></div></td>
                        <td><a class="edit" title="Editer la page"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a class="delete" title="Supprimer la page"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>


                </table>
            </div> <!-- exemple - ligne 2 -->
        </div>
    </div>

<?php
include(dirname(__DIR__).'/footer.php');