<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>

<style type="text/css">
.x-message-box .ext-mb-download {
    background: url("<?=base_url()?>ext/examples/message-box/images/download.gif") no-repeat scroll 6px 0px transparent;
    height: 52px!important;
}
</style>
<?php   $this->import_->import_ext() ; ?>

<script type="text/javascript">
Ext.require([
    'Ext.window.MessageBox',
    'Ext.tip.*'
]);

Ext.onReady(function(){
  
    Ext.get('mb1').on('click', function(e){
        Ext.MessageBox.confirm('Confirm', 'Are you sure you want to do that?', showResult);
	   
    });
	
	
	    function showResult(btn){
        Ext.example.msg('Button Click', 'You clicked the {0} button', btn);
    };

	
});

</script>
</head>

<body>

<h1>MessageBox Dialogs</h1>
<p>The example shows how to use the MessageBox class. Some of the buttons have animations, some are normal.</p>
<p>The js is not minified so it is readable. See <a href="msg-box.js">msg-box.js</a>.</p>

<p>
    <b>Confirm</b><br />
    Standard Yes/No dialog. &nbsp;
    <button id="mb1">Show</button>
</p>



</body>
</html>
