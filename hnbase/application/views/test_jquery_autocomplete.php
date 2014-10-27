<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<?=$this->load->view('import_jqueryui')?>

<script>
$(function() {


 var availableTags = [
"ActionScript",
"AppleScript",
"Asp",
"BASIC",
"C",
"C++",
"Clojure",
"COBOL",
"ColdFusion",
"Erlang",
"Fortran",
"Groovy",
"Haskell",
"Java",
"JavaScript",
"Lisp",
"Perl",
"PHP",
"Python",
"Ruby",
"Scala",
"Scheme"
];


	$( "#search" ).autocomplete(
	{
		 //source:'source.php',
		source:'<?=base_url()?>index.php/home/source_autocomplete/';
		 //source: availableTags
	})

});
</script>


</head>

<body>

<div class="ui-widget">
<label for="tags">Tags: </label>
<input id="search" />
</div>

</body>
</html>
