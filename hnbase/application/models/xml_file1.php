<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Xml_file1 extends  CI_Model {
    function Xml_file1()
    {
        //parent::CI_Model();
		   parent::__construct();
    }
	function   example1()
	{
					return    $xmlstr = "
					<?xml version='1.0' standalone='yes'?>
					<movies>
					 <movie>
					  <title>PHP: Behind the Parser</title>
					  <characters>
					   <character>
						<name>Ms. Coder</name>
						<actor>Onlivia Actora</actor>
					   </character>
					   <character>
						<name>Mr. Coder</name>
						<actor>El Act&#211;r</actor>
					   </character>
					  </characters>
					  <plot>
					   So, this language. It's like, a programming language. Or is it a
					   scripting language? All is revealed in this thrilling horror spoof
					   of a documentary.
					  </plot>
					  <great-lines>
					   <line>PHP solves all my web problems</line>
					  </great-lines>
					  <rating type=\"thumbs\">7</rating>
					  <rating type=\"stars\">5</rating>
					 </movie>
					</movies>";
     }//end  function  
	
}

?>