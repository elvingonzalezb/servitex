CKEDITOR.config.extraPlugins = 'justify';
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for a single toolbar row.
	config.toolbarGroups = [
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },//fuente
		{ name: 'basicstyles', groups: [ 'basicstyles'] },//italica, negrita
		{ name: 'forms' },
		{ name: 'paragraph',   groups: [ 'list', 'align', 'bidi' ] },//viñetas
		{ name: 'colors' },
		{ name: 'others' },
		{ name: 'alignment', groups : [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] }
	];


	// The default plugins included in the basic setup define some buttons that
	// are not needed in a basic editor. They are removed here.
	config.removeButtons = 'Cut,Copy,Paste,Undo,Redo,Anchor,Underline,Strike,Subscript,Superscript';

	// Dialog windows are also simplified.
	config.removeDialogTabs = 'link:advanced';
};
