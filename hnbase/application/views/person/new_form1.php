<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>







<style>
/*
input
{
color:#000000;
font-size:14px;
border:#003300 solid 1px;
height:30px;
margin-bottom:10px;
width:10px; 
}
textarea
{
color:#000000;
font-size:14px;
border:#666666 solid 2px;
height:124px;
margin-bottom:10px;
width:200px;
}
.textbox1
{
 	
    font-size: 13px;
    margin-bottom: 5px;
    display: block;
    padding: 4px;
    border: solid 1px #85b1de;
    width: 300px;
    background-color: #EDF2F7;
}
*/

/*
body
{
    font-family:Gill Sans MT;
    padding:10px;
}
fieldset
{
    border: solid 1px #000;
    padding:10px;
    display:block;
    clear:both;
    margin:5px 0px;
}
legend
{
    padding:0px 10px;
    background:black;
    color:#FFF;
}
input.add
{
    float:right;
}
input.fieldname
{
    float:left;
    clear:left;
    display:block;
    margin:5px;
}
select.fieldtype
{
    float:left;
    display:block;
    margin:5px;
}
input.remove
{
    float:left;
    display:block;
    margin:5px;
}
#yourform label
{
    float:left;
    clear:left;
    display:block;
    margin:5px;
}
#yourform input, #yourform textarea
{
    float:left;
    display:block;
    margin:5px;
}
*/
</style>

<style>
/*input
{
color:#000000;
font-size:14px;
border:#003300 solid 1px;
height:30px;
margin-bottom:10px;
width:10px;

}
textarea
{
color:#000000;
font-size:14px;
border:#666666 solid 2px;
height:124px;
margin-bottom:10px;
width:200px;
}*/

/*body
{
    font-famil:Microsoft Sans Serif;
    padding:10px;
}
fieldset
{
    border: solid 1px #000;
    padding:10px;
    display:block;
    clear:both;
    margin:5px 0px;
}
legend
{
    padding:0px 10px;
    background:black;
    color:#FFF;
}
input.add
{
    float:right;
}
input.fieldname
{
    float:left;
    clear:left;
    display:block;
    margin:5px;
}
select.fieldtype
{
    float:left;
    display:block;
    margin:5px;
}
input.remove
{
    float:left;
    display:block;
    margin:5px;
}
#yourform label
{
    float:left;
    clear:left;
    display:block;
    margin:5px;
}
#yourform input, #yourform textarea
{
    float:left;
    display:block;
    margin:5px;
}
*/
</style>



<!--<script>
$(document).ready(function() {
    $("#add").click(function() {
        var intId = $("#buildyourform div").length + 1;
        var fieldWrapper = $("<div class=\"fieldwrapper\" id=\"field" + intId + "\"/>");
        var fName = $("<input type=\"text\" class=\"fieldname\" />");
        var fType = $("<select class=\"fieldtype\"><option value=\"checkbox\">Checked</option><option value=\"textbox\">Text</option><option value=\"textarea\">Paragraph</option></select>");
        var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\" />");
        removeButton.click(function() {
            $(this).parent().remove();
        });
        fieldWrapper.append(fName);
        fieldWrapper.append(fType);
        fieldWrapper.append(removeButton);
        $("#buildyourform").append(fieldWrapper);
    });
    $("#preview").click(function() {
        $("#yourform").remove();
        var fieldSet = $("<fieldset id=\"yourform\"><legend>Your Form</legend></fieldset>");
        $("#buildyourform div").each(function() {
            var id = "input" + $(this).attr("id").replace("field","");
            var label = $("<label for=\"" + id + "\">" + $(this).find("input.fieldname").first().val() + "</label>");
            var input;
            switch ($(this).find("select.fieldtype").first().val()) {
                case "checkbox":
                    input = $("<input type=\"checkbox\" id=\"" + id + "\" name=\"" + id + "\" />");
                    break;
                case "textbox":
                    input = $("<input type=\"text\" id=\"" + id + "\" name=\"" + id + "\" />");
                    break;
                case "textarea":
                    input = $("<textarea id=\"" + id + "\" name=\"" + id + "\" ></textarea>");
                    break;    
            }
            fieldSet.append(label);
            fieldSet.append(input);
        });
        $("body").append(fieldSet);
    });
});

</script>
-->

<script type="text/javascript">
$(function()   //โปรแกรมตรวจสอบจำนวนวันที่เหลือ
{
    $("#check_passport").click(function()
       { 
           var   iss =  $("#iss_passport").val();  //varible
           var   exp  =  $("#exp_passport").val(); //varible
          // alert('  '  + iss.length + '  ' + exp.length  );
          
          var  arr_iss=iss.split('-');
          var  arr_exp=exp.split('-');
          //alert(arr_iss[0]+'-'+arr_iss[1]);  //if iss
         // alert(arr_exp[0]+'-'+arr_exp[1]);  //if exp
         // alert(''+ arr_exp[2]);
       
        if(  (  parseInt(arr_iss[0]) ==  parseInt(arr_exp[0])   &&    parseInt( arr_exp[1] ) >= parseInt(arr_iss[1])  )  )   
        { //begin    
          $.ajax({
            url: "<?php echo base_url(); ?>index.php/home/check_date/",
                    data: {   iss_passport : $("#iss_passport").val() ,   exp_passport : $("#exp_passport").val()     }, //varible
                    success: function(ret){  
                        var  set_int=parseInt(ret);
                        //var   check_date = parseInt( 90- set_int );
                    /*
                        if(ret=="found"){
                            alert("Found");
                           // $('#test').html(''+ret);
                        }else{
                            alert("NOt found");
                           // $('#test').html(''+ret);
                        }
                     */                  
                    /*
                        $( "#progressbar_passport" ).progressbar({
	                 value: ret
						});
                    */                
                         //alert(''+ set_int);  //tester  date in function
                      if( set_int  >= 0  &&  set_int <= 90 ) 
                      {    
                         $('#txt_passport').html(''+ set_int + '  DAYS' );  //varible
                               // $('#txt_passport').html(''+ check_date + '  วัน' );
                               
                              /* 
                                $( "#progressbar_passport" ).progressbar({  //progress bar
	                        value: set_int,
                                     max: 90
                                 });
                               */  
                                 
                       }         
                       else
                       {
                           $('#txt_passport').html('<font color=\'red\'>Check date Error! (limit  in 90 days)</font>'); 
                           
                         /*  
                           $( "#progressbar_passport" ).progressbar({  //progress bar
	                        value: 0,
                                     max: 90
                                 });
                             */    
                                 
                        }                 
                    },
                           type: "POST"
                  });
           }//end if
           else 
           {
               alert('Check insert value!!');
               //$("#iss_passport").focus();
               $("#exp_passport").focus();
               $('#txt_passport').html('<font color=\'red\'>Check date Error! (limit  in 90 days)</font>'); 
               
                         /*
                           $( "#progressbar_passport" ).progressbar({  //progress bar
	                        value: 0,
                                     max: 90
                                 });
                                 */             
           }                 
       });
});
</script>

<script type="text/javascript">
  $(function()
  {
      //90 Report Date. (วันที่รายงานตัว ),Next 90 Report Date. (วันที่รายงานตัว ) 
     $('#check_visa').click(function(){
      /* function  */   
      check_date('#iss_visa','#exp_v','#txt_visa');      
     }); 
     
     //register_date
     //next_register_date
     //90 Report Date. (วันที่รายงานตัว ), Next 90 Report Date. (วันที่รายงานตัว )
     //txt_register
     //check_register
     $('#check_register').click(function(){
      /* function  */   
        check_date('#register_date','#next_register_date','#txt_register');      
     }); 
     
     
     //Work Permit Iss. Date (วันที่ขออนุญาตทำงาน ) 
     //1452  iss_date_workpermit   Work Permit Iss. Date (วันที่ขออนุญาตทำงาน )
     //1456  exp_date_workpermit 
     //1462  txt_workpermit
     //1461  check_workpermit
   
      $('#check_workpermit').click(function(){
    
        check_date('#iss_date_workpermit','#exp_date_workpermit','#txt_workpermit');      
     }); 
    
     
     
     function check_date(begin,end,txt) 
     { //function check date submit begin - end count date
     	   //alert('testing check_visa');
     	   var   iss =  $(begin).val();  //varible
         var   exp  =  $(end).val(); //varible
         
          var  arr_iss=iss.split('-');
          var  arr_exp=exp.split('-');
          
        // alert(arr_iss[0]+'-'+arr_iss[1]);  //if iss
        //  alert(arr_exp[0]+'-'+arr_exp[1]);  //if exp
        // alert(''+ arr_exp[2]);
        
        if(  (  parseInt(arr_iss[0]) ==  parseInt(arr_exp[0])   &&    parseInt( arr_exp[1] ) >= parseInt(arr_iss[1])  )  )   
        { //begin                 
           //  $(txt).html('test');          
          $.ajax({
            url: "<?php echo base_url(); ?>index.php/home/check_date2/",
                  //  data: {   iss_passport : $("#iss_passport").val() ,   exp_passport : $("#exp_passport").val()     }, //varible
                    data: {   begin : iss ,   end : exp     }, //varible                 
                    success: function(ret){  
                        var  set_int=parseInt(ret);
                      if( set_int  >= 0 && set_int <= 90 ) 
                      {    
                         //$('#txt_passport').html(''+ set_int + '  DAYS' );  //varible
                          $(txt).html(''+ set_int + '  DAYS' );  //varible
                       }         
                       else
                       {
                           $(txt).html('<font color=\'red\'>Check date Error! (limit  in 90 days)</font>');                                
                        }                 
                    },
                           type: "POST"
                  });                                
        }
        else 
        {
             alert('Check insert value!!');
             //$("#iss_passport").focus();
             $(end).focus();
             //$('#txt_passport').html('Check date Error!'); 
             $(txt).html('<font color=\'red\'>Check date Error! (limit  in 90 days)</font>');
         }             
     }//end function
     
          
  });
</script>


<script type="text/javascript">
function   send1()
{
       
     //   $.post('<?=base_url()?>index.php/home/insert_person', //original

/*
      $.post('<?=base_url()?>index.php/home/insert_employee'), 
      $('#form_peson').serialize(),
	   function(data,status)
	   { 
	      //alert(''+data+''+status); 
		   alert(''+data); 
		   //load_content
		   //window.location.assign("http://www.w3schools.com")
		  // window.location.assign("<?=base_url()?>index.php/home/load_content/4")
	   }
	     ));
  */
  
   
	       
}

function send2()
{//begin
    $(function () {
    	  //alert('t');
      
          
          
    	  $.post('<?=base_url()?>index.php/home/insert_employee',$('#form_peson').serialize(),function (data,status) {
    	  	  
    	  	
                            alert('บันทึกข้อมูลแล้ว');
                            window.location="<?=base_url()?>index.php/home/show_employee";
                            
                            
                            
    	  }).done(function()
    	  {  
    	      //alert('second success');
    	  
    	   }).
    	  fail(function()
    	  { 
    	     //alert('fail'); 
    	     });
             
             
    })
    
    
}//end
</script>
<script type="text/javascript"> 
    
 function check_submit2()
 {  
     var pass=$('#exp_passport');
     var  visa=$('#exp_v');
     var  regis=$('#next_register_date');
     var  work=$('#exp_date_workpermit');
     if( pass.val() != '' )
     {    
        check_submit(pass); //#exp_passport
    }
    if( visa.val() != ''  )
    {    
        check_submit(visa);  //วันที่หมดอายุวีซ่า
    } 
    if( regis.val() != ''  )
    {
        check_submit(regis);
    }
    if( work.val() != '' )
    {
        check_submit(work);
    }
 }
    
 function check_submit(end)  //ใช้สำหรับตรวจสอบในการ submit
 {//begin
     //var  today=new Date();
    // var  dateString=today.format('yy-m-dd');
     //alert(dateString);
     //alert(''+dateString);
    //var today=new Date();
  var  d=new Date();
  var  y=d.getFullYear();
  var  m=d.getMonth() + 1;
  var  day=d.getDate();
  var  datenow= y+'-'+m+'-'+day; 
  //alert(''+datenow);
   var  end_va=$(end).val();       

   // alert(end_va);
    
    $(function()
    {
      $.ajax({
            url: "<?php echo base_url(); ?>index.php/home/check_date2/",
                    data: {   begin : datenow ,   end : end_va   }, //varible
                    success: function(ret){ 
                        var  int_ret=parseInt(ret);
                        //return ret;
                       // alert(int_ret);
                       if(  int_ret > 0  )
                       {   
                           send2();
                       }
                       else
                       {
                              alert('Insert Date Error=>check date!!');
                              $(end).val('');
                             //$(end).focus();
                        }
                    },
                        type: "POST"
               }); 
               

    });
 
 } //end
</script>
<script type="text/javascript">  

   $(function() 
   {
        /*
         $( "#birthday" ).datepicker({
             changeMonth: true,
              changeYear: true,

            });
*/

          $("#birthday").datepicker({ 
                dateFormat: "yy-mm-dd", 
                changeMonth: true,
                changeYear: true,
                showButtonPanel:true,
                yearRange: '-100:+1'
            });
    });


/*
$(function(){  
    var dateBefore=null;  
    $("#birthday").datepicker({  
        showButtonPanel: true ,
        yearRange: '-85: +3', //ตัวนี้สำคัญมาก กำหนดช่วง พ.ศ. -85 คือย้อนหลัง 85 ปี  +3 คือช่วงบนเพิ่มไปอีก 3 ปี
        dateFormat: 'dd-mm-yy',  
        //numberOfMonths: 2, //จำนวนของเดือนที่โชว์
        // minDate: -20,
        //showWeek: true,
        firstDay: 1,
         maxDate: "+1M +10D",
        showOn: 'button',  
        buttonImage: '<?php  echo   base_url();  ?>images/calendar.gif',  
        buttonImageOnly: true,  
        dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],   
        monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],  
        changeMonth: true,  //เปลี่ยนเดือนได้
        changeYear: true ,   //เปลี่ยนปีได้
        beforeShow:function(){  
            if($(this).val()!=""){  
                var arrayDate=$(this).val().split("-");       
                arrayDate[2]=parseInt(arrayDate[2])-543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
            }  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);  
 
        },  
        onChangeMonthYear: function(){  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);        
        },  
        onClose:function(){  
            if($(this).val()!="" && $(this).val()==dateBefore){           
                var arrayDate=dateBefore.split("-");  
                arrayDate[2]=parseInt(arrayDate[2])+543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);      
            }         
        },  
        onSelect: function(dateText, inst){   
            dateBefore=$(this).val();  
            var arrayDate=dateText.split("-");  
            arrayDate[2]=parseInt(arrayDate[2])+543;  
            $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
        }  
 
    });  
      
});  
*/


</script>

<script type="text/javascript"> 
  /*
  $(function() 
   {
          $( "#iss_passport" ).datepicker({ 
                dateFormat: "yy-mm-dd", 
                changeMonth: true,
                changeYear: true,
                showButtonPanel:true,
                yearRange: '-100:+1'
            });
    });
    */
    
     //test click exp_passport,exp_passport
     
     
   $(function() 
   {
          $( "#exp_passport" ).datepicker({ 
                dateFormat: "yy-mm-dd", 
                changeMonth: true,
                changeYear: true,
                showButtonPanel:true,
                yearRange: '-100:+10'
            });
    });
    
    
     
   $(function() 
   {
          $( "#iss_passport" ).datepicker({ 
                dateFormat: "yy-mm-dd", 
                changeMonth: true,
                changeYear: true,
                showButtonPanel:true,
                yearRange: '-100:+1',
                onSelect:function(){
					//alert('t');
					$("#exp_passport").val('');
					var  fecha=$(this).datepicker('getDate');
					//$("#exp_passport").datepicker("setDate",new Data(fecha.getTime()));
					$("#exp_passport").datepicker("setDate","+90d");
				}
            });
    });
     
     

/* 
$(function(){  
    var dateBefore=null;  
    $("#iss_passport").datepicker({  
        showButtonPanel: true ,
        yearRange: '-85: +3', //ตัวนี้สำคัญมาก กำหนดช่วง พ.ศ. -85 คือย้อนหลัง 85 ปี  +3 คือช่วงบนเพิ่มไปอีก 3 ปี
        dateFormat: 'dd-mm-yy',  
        //numberOfMonths: 2, //จำนวนของเดือนที่โชว์
        // minDate: -20,
        //showWeek: true,
        firstDay: 1,
         maxDate: "+1M +10D",
        showOn: 'button',  
        buttonImage: '<?php  echo   base_url();  ?>images/calendar.gif',  
        buttonImageOnly: true,  
        dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],   
        monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],  
        changeMonth: true,  //เปลี่ยนเดือนได้
        changeYear: true ,   //เปลี่ยนปีได้
        beforeShow:function(){  
            if($(this).val()!=""){  
                var arrayDate=$(this).val().split("-");       
                arrayDate[2]=parseInt(arrayDate[2])-543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
            }  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);  
 
        },  
        onChangeMonthYear: function(){  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);        
        },  
        onClose:function(){  
            if($(this).val()!="" && $(this).val()==dateBefore){           
                var arrayDate=dateBefore.split("-");  
                arrayDate[2]=parseInt(arrayDate[2])+543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);      
            }         
        },  
        onSelect: function(dateText, inst){   
            dateBefore=$(this).val();  
            var arrayDate=dateText.split("-");  
            arrayDate[2]=parseInt(arrayDate[2])+543;  
            $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
        }  
 
    });  
      
}); 
*/


</script>

<script type="text/javascript">  

  /*
  $(function() 
   {
          $( "#exp_passport" ).datepicker({ 
                dateFormat: "yy-mm-dd", 
                changeMonth: true,
                changeYear: true,
                showButtonPanel:true,
                yearRange: '-100:+10'
            });
    });
    */
    
  

    


/*
$(function(){  
    var dateBefore=null;  
    $("#exp_passport").datepicker({  
        showButtonPanel: true ,
        yearRange: '-85: +3', //ตัวนี้สำคัญมาก กำหนดช่วง พ.ศ. -85 คือย้อนหลัง 85 ปี  +3 คือช่วงบนเพิ่มไปอีก 3 ปี
        dateFormat: 'dd-mm-yy',  
        //numberOfMonths: 2, //จำนวนของเดือนที่โชว์
        // minDate: -20,
        //showWeek: true,
        firstDay: 1,
         maxDate: "+1M +10D",
        showOn: 'button',  
        buttonImage: '<?php  echo   base_url();  ?>images/calendar.gif',  
        buttonImageOnly: true,  
        dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],   
        monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],  
        changeMonth: true,  //เปลี่ยนเดือนได้
        changeYear: true ,   //เปลี่ยนปีได้
        beforeShow:function(){  
            if($(this).val()!=""){  
                var arrayDate=$(this).val().split("-");       
                arrayDate[2]=parseInt(arrayDate[2])-543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
            }  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);  
 
        },  
        onChangeMonthYear: function(){  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);        
        },  
        onClose:function(){  
            if($(this).val()!="" && $(this).val()==dateBefore){           
                var arrayDate=dateBefore.split("-");  
                arrayDate[2]=parseInt(arrayDate[2])+543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);      
            }         
        },  
        onSelect: function(dateText, inst){   
            dateBefore=$(this).val();  
            var arrayDate=dateText.split("-");  
            arrayDate[2]=parseInt(arrayDate[2])+543;  
            $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
        }  
 
    });  
      
}); 
*/

</script>


<script type="text/javascript">  
	
	
	  $(function() 
   {
          $( "#exp_v" ).datepicker({ 
                dateFormat: "yy-mm-dd", 
                changeMonth: true,
                changeYear: true,
                showButtonPanel:true,
                 yearRange: '-100:+10'
            });
    });
	
	

  $(function() 
   {
          $( "#iss_visa" ).datepicker({ 
                dateFormat: "yy-mm-dd", 
                changeMonth: true,
                changeYear: true,
                showButtonPanel:true,
                yearRange: '-100:+1',
                onSelect:function(){
					
					$('#exp_v').datepicker("setDate","+90d");
				}
            });
    });


/*
$(function(){  
    var dateBefore=null;  
    $("#iss_visa").datepicker({  
        showButtonPanel: true ,
        yearRange: '-85: +3', //ตัวนี้สำคัญมาก กำหนดช่วง พ.ศ. -85 คือย้อนหลัง 85 ปี  +3 คือช่วงบนเพิ่มไปอีก 3 ปี
        dateFormat: 'dd-mm-yy',  
        //numberOfMonths: 2, //จำนวนของเดือนที่โชว์
        // minDate: -20,
        //showWeek: true,
        firstDay: 1,
         maxDate: "+1M +10D",
        showOn: 'button',  
        buttonImage: '<?php  echo   base_url();  ?>images/calendar.gif',  
        buttonImageOnly: true,  
        dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],   
        monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],  
        changeMonth: true,  //เปลี่ยนเดือนได้
        changeYear: true ,   //เปลี่ยนปีได้
        beforeShow:function(){  
            if($(this).val()!=""){  
                var arrayDate=$(this).val().split("-");       
                arrayDate[2]=parseInt(arrayDate[2])-543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
            }  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);  
 
        },  
        onChangeMonthYear: function(){  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);        
        },  
        onClose:function(){  
            if($(this).val()!="" && $(this).val()==dateBefore){           
                var arrayDate=dateBefore.split("-");  
                arrayDate[2]=parseInt(arrayDate[2])+543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);      
            }         
        },  
        onSelect: function(dateText, inst){   
            dateBefore=$(this).val();  
            var arrayDate=dateText.split("-");  
            arrayDate[2]=parseInt(arrayDate[2])+543;  
            $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
        }  
 
    });  
      
});
*/

</script>

<script type="text/javascript">  
	
	/*
  $(function() 
   {
          $( "#exp_v" ).datepicker({ 
                dateFormat: "yy-mm-dd", 
                changeMonth: true,
                changeYear: true,
                showButtonPanel:true,
                 yearRange: '-100:+10'
            });
    });
    */
    
    

/*
$(function(){  
    var dateBefore=null;  
    $("#exp_v").datepicker({  
        showButtonPanel: true ,
        yearRange: '-85: +3', //ตัวนี้สำคัญมาก กำหนดช่วง พ.ศ. -85 คือย้อนหลัง 85 ปี  +3 คือช่วงบนเพิ่มไปอีก 3 ปี
        dateFormat: 'dd-mm-yy',  
        //numberOfMonths: 2, //จำนวนของเดือนที่โชว์
        // minDate: -20,
        //showWeek: true,
        firstDay: 1,
         maxDate: "+1M +10D",
        showOn: 'button',  
        buttonImage: '<?php  echo   base_url();  ?>images/calendar.gif',  
        buttonImageOnly: true,  
        dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],   
        monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],  
        changeMonth: true,  //เปลี่ยนเดือนได้
        changeYear: true ,   //เปลี่ยนปีได้
        beforeShow:function(){  
            if($(this).val()!=""){  
                var arrayDate=$(this).val().split("-");       
                arrayDate[2]=parseInt(arrayDate[2])-543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
            }  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);  
 
        },  
        onChangeMonthYear: function(){  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);        
        },  
        onClose:function(){  
            if($(this).val()!="" && $(this).val()==dateBefore){           
                var arrayDate=dateBefore.split("-");  
                arrayDate[2]=parseInt(arrayDate[2])+543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);      
            }         
        },  
        onSelect: function(dateText, inst){   
            dateBefore=$(this).val();  
            var arrayDate=dateText.split("-");  
            arrayDate[2]=parseInt(arrayDate[2])+543;  
            $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
        }  
 
    });  
      
});  
*/

</script>


<script type="text/javascript">

 $(function() 
   {
          $( "#register_date" ).datepicker({ 
                dateFormat: "yy-mm-dd", 
                changeMonth: true,
                changeYear: true,
                showButtonPanel:true,
                yearRange: '-100:+1'
            });
    });

/* 
$(function(){  
    var dateBefore=null;  
    $("#register_date").datepicker({  
        showButtonPanel: true ,
        yearRange: '-85: +3', //ตัวนี้สำคัญมาก กำหนดช่วง พ.ศ. -85 คือย้อนหลัง 85 ปี  +3 คือช่วงบนเพิ่มไปอีก 3 ปี
        dateFormat: 'dd-mm-yy',  
        //numberOfMonths: 2, //จำนวนของเดือนที่โชว์
        // minDate: -20,
        //showWeek: true,
        firstDay: 1,
         maxDate: "+1M +10D",
        showOn: 'button',  
        buttonImage: '<?php  echo   base_url();  ?>images/calendar.gif',  
        buttonImageOnly: true,  
        dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],   
        monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],  
        changeMonth: true,  //เปลี่ยนเดือนได้
        changeYear: true ,   //เปลี่ยนปีได้
        beforeShow:function(){  
            if($(this).val()!=""){  
                var arrayDate=$(this).val().split("-");       
                arrayDate[2]=parseInt(arrayDate[2])-543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
            }  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);  
 
        },  
        onChangeMonthYear: function(){  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);        
        },  
        onClose:function(){  
            if($(this).val()!="" && $(this).val()==dateBefore){           
                var arrayDate=dateBefore.split("-");  
                arrayDate[2]=parseInt(arrayDate[2])+543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);      
            }         
        },  
        onSelect: function(dateText, inst){   
            dateBefore=$(this).val();  
            var arrayDate=dateText.split("-");  
            arrayDate[2]=parseInt(arrayDate[2])+543;  
            $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
        }  
 
    });  
      
}); 
*/

</script>


<script type="text/javascript">  

 $(function() 
   {
          $( "#next_register_date" ).datepicker({ 
                dateFormat: "yy-mm-dd", 
                changeMonth: true,
                changeYear: true,
                showButtonPanel:true,
                yearRange: '-100:+10'
            });
    });

/*
$(function(){  
    var dateBefore=null;  
    $("#next_register_date").datepicker({  
        showButtonPanel: true ,
        yearRange: '-85: +3', //ตัวนี้สำคัญมาก กำหนดช่วง พ.ศ. -85 คือย้อนหลัง 85 ปี  +3 คือช่วงบนเพิ่มไปอีก 3 ปี
        dateFormat: 'dd-mm-yy',  
        //numberOfMonths: 2, //จำนวนของเดือนที่โชว์
        // minDate: -20,
        //showWeek: true,
        firstDay: 1,
         maxDate: "+1M +10D",
        showOn: 'button',  
        buttonImage: '<?php  echo   base_url();  ?>images/calendar.gif',  
        buttonImageOnly: true,  
        dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],   
        monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],  
        changeMonth: true,  //เปลี่ยนเดือนได้
        changeYear: true ,   //เปลี่ยนปีได้
        beforeShow:function(){  
            if($(this).val()!=""){  
                var arrayDate=$(this).val().split("-");       
                arrayDate[2]=parseInt(arrayDate[2])-543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
            }  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);  
 
        },  
        onChangeMonthYear: function(){  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);        
        },  
        onClose:function(){  
            if($(this).val()!="" && $(this).val()==dateBefore){           
                var arrayDate=dateBefore.split("-");  
                arrayDate[2]=parseInt(arrayDate[2])+543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);      
            }         
        },  
        onSelect: function(dateText, inst){   
            dateBefore=$(this).val();  
            var arrayDate=dateText.split("-");  
            arrayDate[2]=parseInt(arrayDate[2])+543;  
            $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
        }  
 
    });  
      
}); 
*/

</script>


<script type="text/javascript"> 

 $(function() 
   {
          $( "#start_work_date" ).datepicker({ 
                dateFormat: "yy-mm-dd", 
                changeMonth: true,
                changeYear: true,
                showButtonPanel:true,
                yearRange: '-100:+1'
            });
    });


/* 
$(function(){  
    var dateBefore=null;  
    $("#start_work_date").datepicker({  
        showButtonPanel: true ,
        yearRange: '-85: +3', //ตัวนี้สำคัญมาก กำหนดช่วง พ.ศ. -85 คือย้อนหลัง 85 ปี  +3 คือช่วงบนเพิ่มไปอีก 3 ปี
        dateFormat: 'dd-mm-yy',  
        //numberOfMonths: 2, //จำนวนของเดือนที่โชว์
        // minDate: -20,
        //showWeek: true,
        firstDay: 1,
         maxDate: "+1M +10D",
        showOn: 'button',  
        buttonImage: '<?php  echo   base_url();  ?>images/calendar.gif',  
        buttonImageOnly: true,  
        dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],   
        monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],  
        changeMonth: true,  //เปลี่ยนเดือนได้
        changeYear: true ,   //เปลี่ยนปีได้
        beforeShow:function(){  
            if($(this).val()!=""){  
                var arrayDate=$(this).val().split("-");       
                arrayDate[2]=parseInt(arrayDate[2])-543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
            }  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);  
 
        },  
        onChangeMonthYear: function(){  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);        
        },  
        onClose:function(){  
            if($(this).val()!="" && $(this).val()==dateBefore){           
                var arrayDate=dateBefore.split("-");  
                arrayDate[2]=parseInt(arrayDate[2])+543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);      
            }         
        },  
        onSelect: function(dateText, inst){   
            dateBefore=$(this).val();  
            var arrayDate=dateText.split("-");  
            arrayDate[2]=parseInt(arrayDate[2])+543;  
            $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
        }  
 
    });  
      
}); 
*/

</script>


<script type="text/javascript">  

 $(function() 
   {
          $( "#iss_date_workpermit" ).datepicker({ 
                dateFormat: "yy-mm-dd", 
                changeMonth: true,
                changeYear: true,
                showButtonPanel:true,
                yearRange: '-100:+10'
            });
    });

/*
$(function(){  
    var dateBefore=null;  
    $("#iss_date_workpermit").datepicker({  
        showButtonPanel: true ,
        yearRange: '-85: +3', //ตัวนี้สำคัญมาก กำหนดช่วง พ.ศ. -85 คือย้อนหลัง 85 ปี  +3 คือช่วงบนเพิ่มไปอีก 3 ปี
        dateFormat: 'dd-mm-yy',  
        //numberOfMonths: 2, //จำนวนของเดือนที่โชว์
        // minDate: -20,
        //showWeek: true,
        firstDay: 1,
         maxDate: "+1M +10D",
        showOn: 'button',  
        buttonImage: '<?php  echo   base_url();  ?>images/calendar.gif',  
        buttonImageOnly: true,  
        dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],   
        monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],  
        changeMonth: true,  //เปลี่ยนเดือนได้
        changeYear: true ,   //เปลี่ยนปีได้
        beforeShow:function(){  
            if($(this).val()!=""){  
                var arrayDate=$(this).val().split("-");       
                arrayDate[2]=parseInt(arrayDate[2])-543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
            }  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);  
 
        },  
        onChangeMonthYear: function(){  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);        
        },  
        onClose:function(){  
            if($(this).val()!="" && $(this).val()==dateBefore){           
                var arrayDate=dateBefore.split("-");  
                arrayDate[2]=parseInt(arrayDate[2])+543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);      
            }         
        },  
        onSelect: function(dateText, inst){   
            dateBefore=$(this).val();  
            var arrayDate=dateText.split("-");  
            arrayDate[2]=parseInt(arrayDate[2])+543;  
            $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
        }  
 
    });  
      
});  
*/


</script>

<script type="text/javascript"> 

 $(function() 
   {
          $( "#exp_date_workpermit" ).datepicker({ 
                dateFormat: "yy-mm-dd", 
                changeMonth: true,
                changeYear: true,
                showButtonPanel:true,
                yearRange: '-100:+10'
            });
    });

/*
$(function(){  
    var dateBefore=null;  
    $("#exp_date_workpermit").datepicker({  
        showButtonPanel: true ,
        yearRange: '-85: +3', //ตัวนี้สำคัญมาก กำหนดช่วง พ.ศ. -85 คือย้อนหลัง 85 ปี  +3 คือช่วงบนเพิ่มไปอีก 3 ปี
        dateFormat: 'dd-mm-yy',  
        //numberOfMonths: 2, //จำนวนของเดือนที่โชว์
        // minDate: -20,
        //showWeek: true,
        firstDay: 1,
         maxDate: "+1M +10D",
        showOn: 'button',  
        buttonImage: '<?php  echo   base_url();  ?>images/calendar.gif',  
        buttonImageOnly: true,  
        dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],   
        monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],  
        changeMonth: true,  //เปลี่ยนเดือนได้
        changeYear: true ,   //เปลี่ยนปีได้
        beforeShow:function(){  
            if($(this).val()!=""){  
                var arrayDate=$(this).val().split("-");       
                arrayDate[2]=parseInt(arrayDate[2])-543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
            }  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);  
 
        },  
        onChangeMonthYear: function(){  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);        
        },  
        onClose:function(){  
            if($(this).val()!="" && $(this).val()==dateBefore){           
                var arrayDate=dateBefore.split("-");  
                arrayDate[2]=parseInt(arrayDate[2])+543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);      
            }         
        },  
        onSelect: function(dateText, inst){   
            dateBefore=$(this).val();  
            var arrayDate=dateText.split("-");  
            arrayDate[2]=parseInt(arrayDate[2])+543;  
            $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
        }  
 
    });  
      
}); 
*/

</script>

<script type="text/javascript">  


 $(function() 
   {
          $( "#date_signup" ).datepicker({ 
                dateFormat: "yy-mm-dd", 
                changeMonth: true,
                changeYear: true,
                showButtonPanel:true,
                yearRange: '-100:+1'
            });
    });


/*
$(function(){  
    var dateBefore=null;  
    $("#date_signup").datepicker({  
        showButtonPanel: true ,
        yearRange: '-85: +3', //ตัวนี้สำคัญมาก กำหนดช่วง พ.ศ. -85 คือย้อนหลัง 85 ปี  +3 คือช่วงบนเพิ่มไปอีก 3 ปี
        dateFormat: 'dd-mm-yy',  
        //numberOfMonths: 2, //จำนวนของเดือนที่โชว์
        // minDate: -20,
        //showWeek: true,
        firstDay: 1,
         maxDate: "+1M +10D",
        showOn: 'button',  
        buttonImage: '<?php  echo   base_url();  ?>images/calendar.gif',  
        buttonImageOnly: true,  
        dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],   
        monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],  
        changeMonth: true,  //เปลี่ยนเดือนได้
        changeYear: true ,   //เปลี่ยนปีได้
        beforeShow:function(){  
            if($(this).val()!=""){  
                var arrayDate=$(this).val().split("-");       
                arrayDate[2]=parseInt(arrayDate[2])-543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
            }  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);  
 
        },  
        onChangeMonthYear: function(){  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);        
        },  
        onClose:function(){  
            if($(this).val()!="" && $(this).val()==dateBefore){           
                var arrayDate=dateBefore.split("-");  
                arrayDate[2]=parseInt(arrayDate[2])+543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);      
            }         
        },  
        onSelect: function(dateText, inst){   
            dateBefore=$(this).val();  
            var arrayDate=dateText.split("-");  
            arrayDate[2]=parseInt(arrayDate[2])+543;  
            $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
        }  
 
    });  
      
});
*/

</script>


<script type="text/javascript">  
$(function() {
	
/*	
$( "#progressbar_passport" ).progressbar({
value: 0,
max:90
});
*/

});
</script>

<script type="text/javascript"> 
/* 
$(function() {
$( "#progressbar_visa" ).progressbar({
value: 60
});
});
*/
</script>


<script type="text/javascript">  
/*
$(function() {
$( "#progressbar_report" ).progressbar({
value: 60
});
});
*/
</script>


<script type="text/javascript"> 
/* 
$(function() {
$( "#progressbar_expire" ).progressbar({
value: 60
});
});
*/

</script>



<?php $this->load->view("import_daterange")?>

<script type="text/javascript">  
  $(function(){
  	
  	
      
/*
	define a new language named "custom"
	*/

	$.dateRangePickerLanguages['custom'] = 
	{
		'selected': 'Choosed:',
		'days': 'Days',
		'apply': 'Close',
		'week-1' : 'Mon',
		'week-2' : 'Tue',
		'week-3' : 'Wed',
		'week-4' : 'Thu',
		'week-5' : 'Fri',
		'week-6' : 'Sat',
		'week-7' : 'Sun',
		'month-name': ['January','February','March','April','May','June','July','August','September','October','November','December'],
		'shortcuts' : 'Shortcuts',
		'past': 'Past',
		'7days' : '7days',
		'14days' : '14days',
		'30days' : '30days',
		'previous' : 'Previous',
		'prev-week' : 'Week',
		'prev-month' : 'Month',
		'prev-quarter' : 'Quarter',
		'prev-year' : 'Year',
		'less-than' : 'Date range should longer than %d days',
		'more-than' : 'Date range should less than %d days',
		'default-more' : 'Please select a date range longer than %d days',
		'default-less' : 'Please select a date range less than %d days',
		'default-range' : 'Please select a date range between %d and %d days',
		'default-default': 'This is costom language'
	};
	
          // date-range00  Passport Date       
        $('#date-range00').dateRangePicker({  
           
               startOfWeek: 'monday',
               separator : ' to ',           
            shortcuts : 
		      {
			      'next-days': [7,90,180],
               // 'next-days': [90,180]
		         'next': ['week','month','year']
		      }
            
        });
            
        function splitdate(date,range,nameid)
        {
        	  //var  range_date=$('#date-range00').val();
        	  var  range_date=$(date).val();
        	  var  begin=range_date.split(" ");
           return $(nameid).val(begin[range]);
        }
        
        
          $('#insert_passport').button({  }).click(function(){
        	    
        	    //var  range_date=$('#date-range00').val();
        	    var  range_date=$('#date-range00');
        	    var  begin=splitdate(range_date,0,'#iss_passport');
        	    var  end=splitdate(range_date,2,'#exp_passport');
        	    
        	   // var  begin=range_date.split(" ");
        	    
        	     //alert(' ' + begin[0] );
        	    
        	    // $('#iss_passport').val(begin[0]);
        	    // $('#exp_passport').val(begin[2]);
        	    
        	     
        	});
        
   //##------------------------- START PASSPORT----------------  
   //  VISA Date       
        $('#date-range01').dateRangePicker({  
           
               startOfWeek: 'monday',
               separator : ' to ',           
            shortcuts : 
		      {
			      'next-days': [7,90,180],
               // 'next-days': [90,180]
		         'next': ['week','month','year']
		      }
            
        });
        
              
        $('#insert_visa').button({  }).click(function(){
        	    
        	    var  range_date=$('#date-range01');
        	    var  begin2=splitdate(range_date,0,'#iss_visa');
        	    var  end2=splitdate(range_date,2,'#exp_v');
        	    
        	   // var  begin=range_date.split(" ");
        	    
        	     //alert(' ' + begin[0] );
        	    
        	    // $('#iss_passport').val(begin[0]);
        	    // $('#exp_passport').val(begin[2]);
        	    
        	     
        	});
        	
        
  //##------------------------- 90 Report Date. (วันที่รายงานตัว )---------------- 
       $('#date-range02').dateRangePicker({  
           
               startOfWeek: 'monday',
               separator : ' to ',           
            shortcuts : 
		      {
			      'next-days': [7,90,180],
               // 'next-days': [90,180]
		         'next': ['week','month','year']
		      }
            
        });
          
          $('#insert_report').button({  }).click(function(){
        	    
        	    var  range_date=$('#date-range02');
        	    var  begin=splitdate(range_date,0,'#register_date');
        	    var  end=splitdate(range_date,2,'#next_register_date');
        	    
        	   // var  begin=range_date.split(" ");
        	    
        	     //alert(' ' + begin[0] );
        	    
        	    // $('#iss_passport').val(begin[0]);
        	    // $('#exp_passport').val(begin[2]);
        	    
        	     
        	});
        	
        	
        	//##-------- Work Permit Iss. Date--------
        	$('#date-range03').dateRangePicker({  
           
               startOfWeek: 'monday',
               separator : ' to ',           
            shortcuts : 
		      {
			      'next-days': [7,90,180],
               // 'next-days': [90,180]
		         'next': ['week','month','year']
		      }
            
        });
        $('#insert_work').button({  }).click(function(){
        	    
        	    var  range_date=$('#date-range03');
        	    var  begin=splitdate(range_date,0,'#iss_date_workpermit');
        	    var  end=splitdate(range_date,2,'#exp_date_workpermit');
        	    
        	   // var  begin=range_date.split(" ");
        	    
        	     //alert(' ' + begin[0] );
        	    
        	    // $('#iss_passport').val(begin[0]);
        	    // $('#exp_passport').val(begin[2]);
        	    
        	     
        	});  
        
        
       	
       		
  	
  	});
</script>




</head>

<body>
   <?php //$this->load->view('load_bootstrap') ?>
  
  
   <?PHP // echo  form_open('home/insert_employee')?>
   <form id="form_peson">
   <?php echo  form_fieldset(''.$fieldset.''); ?>
         
       <ul>
       
        
          

  
           
           
           <li>
               First Name (ชื่อ-สกุล) : 
               
               <!--
               <select id="prename" name="prename">
			<?PHP  //$this->selectmodel->prename_select();  ?>
               </select>
               -->
               
               <input type="text" name="firstname"  id="firstname"    maxlength="20"  style="width:20%" /> 
               -
               <input type="text" name="lastname"  id="lastname"  maxlength="20"   style="width:25%" />
           </li>
           <li>
            Call Name (ชื่อเล่น) : <input type="text" name="callname"  id="callname"  maxlength="20"  style="width:30%" />
            </li>
           <li>
               Birth Date (วัน-เดือน-ปี เกิด) : <input name="birthday" readonly="true" type="text" id="birthday"  style="width:20%" size="10" maxlength="20"/>
           </li>
           
           <li>
            Birth Place (ภูมิลำเนาเดิม) : <input type="text" name="birth_place"  id="birth_place"   maxlength="100"  style="width:50%" />
            </li>
           
           <li>
            TR38/1 No (เลขที่ ทร.38/1) : <input type="text" name="tr38_1"  id="tr38_1"  maxlength="100"  style="width:30%" />
            </li>
           
           <li>
            Address (ที่อยู่) : <input type="text" name="address"  id="address"  maxlength="100"  style="width:60%" />
            </li>
           
           <li>
            Mobile (มือถือ) : <input type="text" name="mobile"  id="mobile"  maxlength="10"  style="width:30%" />
            </li>
           
            <li>
            Friends/Relatives (เพื่อน/ญาติ) : <input type="text" name="friends_relatives"  id="friends_relatives"  maxlength="50"  style="width:50%" />
            </li>
           
            <li>
            Mobile (เบอร์ติดต่อ) : <input type="text" name="mobile_contact"  id="mobile_contact"  maxlength="10"  style="width:30%" />
            </li>
           
           <li>
            Notice (ข้อมูล/หมายเหตุอื่นๆ ) : <input type="text" name="notice"  id="notice"  maxlength="10"  style="width:60%" />
            </li>
           
            <li>
            PASSPORT NO (เลขที่หนังสือเดินทาง ) : <input type="text" name="PASSPORT_NO"  id="PASSPORT_NO"  maxlength="10"  style="width:30%" />
            </li>
            
            <!--
            <li>
                 <div class="demo">
                     test date range : <input id="date-range00" size="40" value=""> 
                            
                 </div>            
            </li>
            -->
            
           <li>

               <div class="demo">
                   Passport Date : <input id="date-range00" size="20" value="">  
                   <button type="button" id="insert_passport"><span class="ui-icon 	ui-icon-calendar" /></span>Passport Insert Date </button>         
               </div>
           </li>
           
           
           
            <li>
            PASS Iss. (วันที่ออกพาสปอร์ต ) : <input type="text" name="iss_passport" readonly="true"
              id="iss_passport" value=""  maxlength="10"  style="width:20%" />
            </li>
           
           <li>
            PASS Exp. (วันที่หมดอายุพาสปอร์ต ) : <input type="text" name="exp_passport"  id="exp_passport"  maxlength="10"  style="width:20%" />
            </li>
           
           
           <li>
               <button type="button" id="check_passport"><span class="ui-icon 	ui-icon-clock" /></span>PASSPORT count DATE </button> :
               <span id="txt_passport"></span>
               
               <!--
               <br/>
                   <div id="progressbar_passport"></div>
                -->
                
               
           </li>
           
           

           
           <li>

               <div class="demo">
                   Visa Date : <input id="date-range01" size="20" value="">  
                   <button type="button" id="insert_visa"><span class="ui-icon 	ui-icon-calendar" /></span>Visa Insert Date </button>         
               </div>
           </li>
           
           
           
           </li>
           
            <li>
            VISA Iss. (วันที่ออกวีซ่า ) : <input type="text" name="iss_visa" readonly="true"  id="iss_visa"  maxlength="10"  style="width:20%" />
            </li>
           
           <li>
            VISA Exp. (วันที่หมดอายุวีซ่า ) : <input type="text" name="exp_v"   id="exp_v" maxlength="10" style="width:20%" />
            </li>
           
           <li>
               <button type="button" id="check_visa"  ><span class="ui-icon ui-icon-clock" /></span>VISA count DATE </button> :
               <span id="txt_visa"></span>
               
               <!--
               <br/>
                   <div id="progressbar_visa"></div>
               -->
               
           </li>
           
           
           <li>

               <div class="demo">
                   Report Date : <input id="date-range02" size="20" value="">  
                   <button type="button" id="insert_report"><span class="ui-icon 	ui-icon-calendar" /></span>Report Insert Date </button>         
               </div>
           </li>
           
            <li>
            90 Report Date. (วันที่รายงานตัว ) : <input type="text" name="register_date"  id="register_date"  maxlength="10"  style="width:20%" />
            </li>
           
            <li>
           Next 90 Report Date. (วันที่รายงานตัว ) : <input type="text" name="next_register_date"  id="next_register_date"   maxlength="10"  style="width:20%" />
            </li>
           
           <li>
               <button type="button" id="check_register"><span class="ui-icon ui-icon-clock" /></span>90 Report count DATE</button> :
               <span id="txt_register"></span>
               <!--
               <br/>
                   <div id="progressbar_report"></div>
               -->    
                   
               
           </li>
           
           <li>
           HM CODE (รหัสพนักงาน ) : <input type="text" name="hm_code"  id="hm_code"  maxlength="10"  style="width:30%" />
            </li>
           
           <li>
           Line/Section (แผนก ) : <input type="text" name="line_section"  id="line_section"  maxlength="50"  style="width:50%" />
            </li>
           
            <li>
          Start Work Date (วันที่เข้าทำงาน ) : <input type="text" name="start_work_date"  id="start_work_date"   maxlength="10"  style="width:20%" />
            </li>
           
           <li>
           Work Permit N (เลขที่ใบอนุญาต ทำงาน ) : <input type="text" name="work_permit"  id="work_permit"   maxlength="10"  style="width:30%" />
            </li>
            
            
            
            <li>

               <div class="demo">
                   Report Date : <input id="date-range03" size="20" value="">  
                   <button type="button" id="insert_work"><span class="ui-icon 	ui-icon-calendar" /></span>Report Insert Date </button>         
               </div>
           </li>
            
            
           
            <li>
          Work Permit Iss. Date (วันที่ขออนุญาตทำงาน ) : <input type="text" name="iss_date_workpermit"  id="iss_date_workpermit"   maxlength="10"  style="width:20%" />
            </li>
           
           <li>
          Work Permit Exp. Date (วันที่ใบอนุญาตทำงานหมดอายุ ) : <input type="text" name="exp_date_workpermit"  id="exp_date_workpermit"   maxlength="10"  style="width:20%" />
            </li>
           
           
            <li>
               <button type="button" id="check_workpermit"><span class="ui-icon ui-icon-clock" /></span> Date Expire </button> :               
               <span id="txt_workpermit"></span>
               
               <!--
               <br/>
                   <div id="progressbar_expire"></div>
                 -->  
               
           </li>
           
             <li>
           (เลขที่ประกันสังคม ) : <input type="text" name="number_social_security"  id="number_social_security"  maxlength="50"  style="width:50%" />
            </li>
           
             <li>
          (วันที่ขึ้นทะเบียน ) : <input type="text" name="date_signup"  id="date_signup"  maxlength="10"  style="width:20%" />
            </li>
           
       </ul>
       
       
       
       
    
<!--    <button type="button" class="btn btn-default">Default</button>
-->	
		<!--<button type="button" onclick="javaScript:send2()" >Add</button>-->
                <!--<button type="button" onclick="javaScript:check_submit('#exp_passport')" >Add</button>-->
                <button type="button" onclick="javaScript:check_submit2()" >Add</button>
                
                
                
        <button type="reset" >Cancel</button>

<!--    <button type="button" class="btn btn-info">Info</button>
    <button type="button" class="btn btn-danger">Danger</button>
-->    
    <?PHP echo form_fieldset_close(); ?>
    </form>
    <?PHP //echo form_close()?>
</body>
</html>


