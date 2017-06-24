<?php
include(dirname(__DIR__).'/header.php');
include(dirname(__DIR__).'/menu_gauche.tpl.php');
?>

    <div class="container">
        <div class="row"> <!-- exemple - ligne 1 -->
            <div class="col-10 title">
                <h2>Utilisteurs inscrits</h2>
            </div>
        </div>
        <div class="row"> <!-- exemple - ligne 2 -->
            <div class="col-10 col-offset-1" id="table_container">
                <table class="form-group">
                    <tr>
                        <th>id</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Login</th>
                        <th>E-mail</th>
                        <th>Rôle</th>
                        <th>Inscris le</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>THOREL</td>
                        <td>Robin</td>
                        <td>Brixton</td>
                        <td>thorelrobin@yahoo.fr</td>
                        <td>Administrateur</td>
                        <td>22/05/2017</td>
                        <td title="active"><div id="user_active"></div></td>
                        <td><a class="edit" title="Edition de l'utilisateur"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a class="delete" title="Bannir l'utilisateur"><i class="fa fa-times" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>DIOURI</td>
                        <td>Younes</td>
                        <td>jumk</td>
                        <td>younesdiouri@yahoo.fr</td>
                        <td>Administrateur</td>
                        <td>22/05/2017</td>
                        <td><div id="user_inactive"></div></td>
                        <td><a class="edit" title="Edition de l'utilisateur"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a class="delete" title="Bannir l'utilisateur"><i class="fa fa-times" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>NANA</td>
                        <td>Onésie</td>
                        <td>onesie</td>
                        <td>nanaonesie@yahoo.fr</td>
                        <td>Administrateur</td>
                        <td>22/05/2017</td>
                        <td><div id="user_inactive"></div></td>
                        <td><a class="edit" title="Edition de l'utilisateur"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a class="delete" title="Bannir l'utilisateur"><i class="fa fa-times" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>RADOSAVLJEVIC </td>
                        <td>Sinicha</td>
                        <td>sinicha</td>
                        <td>sinicharadosav@yahoo.fr</td>
                        <td>Administrateur</td>
                        <td>22/05/2017</td>
                        <td><div id="user_active"></div></td>
                        <td><a class="edit" title="Edition de l'utilisateur"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a class="delete" title="Bannir l'utilisateur"><i class="fa fa-times" aria-hidden="true"></i></a>
                        </td>
                    </tr>

                </table>
            </div> <!-- exemple - ligne 2 -->
        </div>
    </div>

<?php
include(dirname(__DIR__).'/footer.php');