var myId = "";

function selectedItemCallback(newId) {
    myId = newId;
}

tinymce.PluginManager.add('importImageSMW', function(editor, url) {
	function winImportImage() {
        // Ouvre une iframe avec l'URL indiqué
        editor.windowManager.open({
            title: 'Importation d\'image',
            url: 'http://localhost/setupmywebsite/smw-admin/multimedia/pluginTiny',
            width: 640,
            height: 480,
            buttons: [{
                text: 'Fermer',
                onclick: 'close'
            }, {
                text: 'Ok',
                onclick: function() {
                    editor.insertContent('<img src="' + myId + '" alt="" width="120px">');
                    editor.windowManager.close();
                }
            }]
        });
    }
	
    // Add a button that opens a window
    editor.addButton('importImageSMW', {
        icon: 'image',
        tooltip: 'Importer des images de SMW',
        onclick: winImportImage
    });

    // Ajoute un item dans le menu lorsqu'il est appelé
    editor.addMenuItem('importImageSMW', {
        text: 'Importation d\'image',
        icon: 'image',
        context: 'tools',
        onclick: winImportImage,
        prependToContext: true
    });
});
