    <div class="container">
    	<div class="row">
    		<div class="col-10 title">
    			<h2>Editer un media</h2>
    		</div>
    	</div>
    	
    	<?php if(isset($errors) || isset($success)) { ?>
        	<div class="row">
        	<?php if(isset($success)) { ?>
        		<div class="col-10">
        			<h3><?php echo $success ?></h3>
        		</div>
        	<?php } elseif (isset($errors)) { ?>
        		<?php foreach($errors as $error) { ?>
            		<div class="col-10">
            			<h3><?php echo $error ?></h3>
            		</div>
        		<?php } ?>
        	<?php } ?>
        	</div>
    	<?php } ?>
	
        <?php if(isset($mediaExist) && $mediaExist && isset($media)) { ?>
            <div class="row">
        		<form action="" method="post">
        			<div class="col-7">
        				<div class="row">
        					<label>Titre</label><br>
            				<input type="text" name="title"
            					class="form-group col-4 col-offset-1" value="<?php echo $media->getName() ?>" required="required" maxlength="60"><br>
            				<label>Description</label><br>
            				<input type="text" name="description"
            					class="form-group col-4 col-offset-1" value="<?php echo $media->getDescription() ?>" maxlength="120">
        				</div>
        				<div class="col-10" >
        					<img src="<?php echo ABSOLUTE_PATH_FRONT.$media->getLink() ?>" alt="<?php echo $media->getDescription() ?>" style="max-width:80%">
        				</div>
        			</div>

        
        
        			<div class="col-4 col-offset-1">
        				<div class="col-12 right-content">
            				<h2>Propriétés du média</h2>
            				<div class="col-10 col-offset-1 left-content">
            					<label>Créé par : <?php echo $media->getAuthor() ?></label><br>
            					<label>Type : <?php echo $media->getFormat() ?></label><br>
								<label>Lien : <input type="text" class="form-group" disabled="disabled" value ="<?php echo ABSOLUTE_PATH_FRONT.$media->getLink() ?>"></label>
            				</div>
        				</div>
        				<div class="col-12 right-content">
            				<h2>Actions sur le média</h2>
            				<input type="submit" class="form-group" value="Modifier">
            				<a href="<?php echo ABSOLUTE_PATH_BACK.'multimedia/delete/'.$media->getId() ?>">Supprimer</a>
            			</div>
        			</div>
        
        		</form>
        	</div>
        <?php } else { ?>
            <div class="row">
				<div class="col-10">Le média n'existe pas.</div>
			</div>
    	<?php } ?>
    </div>
