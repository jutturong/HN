// JavaScript Document
$(function()  //สำหรับโหลดเนื้อหา menu ด้านขวามือ
{
   function   rigth_content_loader(ajax_link1,ajax_link2)
   {
					   $("#link_left1").click(function()
							   {  
									  alert(''+ajax_link1);  
									  $('#right_content').load(ajax_link2);
									  return false;  
							   }
							  );
							   $("#link_left2").click(function()
							   {  
									 // alert('t2');  
									  return false;  
							   }
							  );
   }
		   
		   
}
);
