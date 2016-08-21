/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.language = 'vi';
	// config.uiColor = '#AADC6E';
        config.enterMode = CKEDITOR.ENTER_BR;
	var path = 'http://hotel.git-dev.new/public/ckfinder/';
	config.filebrowserBrowseUrl = path+'ckfinder.html';
 
	config.filebrowserImageBrowseUrl = path+'ckfinder.html?type=Images';
	 
	config.filebrowserFlashBrowseUrl = path+'ckfinder.html?type=Flash';
	 
	config.filebrowserUploadUrl = path+'core/connector/php/connector.php?command=QuickUpload&type=Files';
	 
	config.filebrowserImageUploadUrl = path+'core/connector/php/connector.php?command=QuickUpload&type=Images';
	 
	config.filebrowserFlashUploadUrl = path+'core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
