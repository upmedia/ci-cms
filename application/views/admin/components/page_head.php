<!DOCTYPE html>
<html>
  <head>
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta charset="UTF-8">
    <title><?php echo $meta_title ?></title>
    <!-- Bootstrap -->
    <link href="<?php echo site_url('css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
    <link href="<?php echo site_url('css/bootstrap-responsive.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo site_url('css/ui-lightness/jquery-ui-1.10.0.custom.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo site_url('css/admin.css'); ?>" rel="stylesheet">
     <link href="<?php echo site_url('css/datepicker.css'); ?>" rel="stylesheet">

    <script src="<?php echo site_url('js/jquery-1.9.0.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo site_url('js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo site_url('js/bootstrap-datepicker.js') ?>"></script>
    
    <?php if(isset($sortable) && $sortable === TRUE): ?>
	    <script src="<?php echo site_url('js/jquery-ui-1.10.0.custom.min.js') ?>" type="text/javascript"></script>
	    <script src="<?php echo site_url('js/jquery.mjs.nestedSortable.js') ?>" type="text/javascript"></script>
	<?php endif; ?>

    <!-- Load jQuery build -->
	<script type="text/javascript" src="<?php echo site_url('js/tiny_mce/tiny_mce.js') ?>"></script>
	<script type="text/javascript">
	tinyMCE.init({
	        // General options
	        mode : "textareas",
	        theme : "advanced",
	        plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

	        // Theme options
	        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
	        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
	        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
	        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
	        theme_advanced_toolbar_location : "top",
	        theme_advanced_toolbar_align : "left",
	        theme_advanced_statusbar_location : "bottom",
	        theme_advanced_resizing : true,
	});
	</script>
  </head>