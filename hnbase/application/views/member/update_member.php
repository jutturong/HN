<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php $this->import_->datepicker_style();  //css style  datepicker  ?>
 <script>
//$(function() {
//$( "#birthday" ).datepicker(
//          { 
//		        showButtonPanel: true ,
//				changeMonth: true,
//				changeYear: true,
//				buttonImage: "<?=base_url()?>images/calendar.gif"
//				//$( "#datepicker" ).datepicker( "option", "dateFormat", $( this ).val() );
//		   }
//		                                        );
//});
</script>

<script type="text/javascript">  
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
</script> 

<script type="text/javascript">
$(function()
{
      $('button:first').button( {    icons:{  primary:"ui-icon-clipboard" }     } ).click(function()
	         {  
					  $.post('<?=base_url()?>index.php/member/insert_member',
					  {  
					        user:$('#user').val(),
					        password:$('#password').val(),
						    birthday:$('#birthday').val(),
							lastname:$('#lastname').val(),
							email:$('#email').val(),
							user_enable:$('#user_enable').val(),
							level_user:$('#level_user').val(),
							id_card:$('#id_card').val(),
							address:$('#address').val(),
							  
					  }
					  ,function(data,status)
					  {   
					        //alert(''+data+''+status);   
							//alert(''+ data);   
							//alert(''+ status);   
							if( status )
							{
							          //	alert(''+ data);  
									  //=======================================================
											//Ext.get('mb6').on('click', function(){
													Ext.MessageBox.show({
													   title: 'กรุณารอสักครู่',
													   msg: 'กำลังบันทึกข้อมูล',
													   progressText: 'Recording..',
													   width:300,
													   progress:true,
													   closable:false,
													   //animateTarget: 'mb6'
												   });
											
												   // this hideous block creates the bogus progress
												   var f = function(v){
														return function(){
															if(v == 12){
																Ext.MessageBox.hide();
																Ext.example.msg('เสร็จสมบูรณ์', 'บันทึกข้อมูลแล้ว');
															}else{
																var i = v/11;
																Ext.MessageBox.updateProgress(i, Math.round(100*i)+'% ประมวลผล');
															}
													   };
												   };
												   for(var i = 1; i < 13; i++){
													   setTimeout(f(i), i*500);
												   }
												//});
									  //======================================================== 
									   $('#right_content').load('<?=base_url()?>index.php/member/member_menu/3');
							}
					   })
			 }).next().button({   icons:{   primary:'ui-icon-refresh' }    });
}
);
</script>

</head>

<body>

<?=form_open('member/update_user')?>

<table width="469" cellpadding="5" cellspacing="5" border="2">
<tr>
<td width="142">ชื่อ - นามสกุล  :</td>
<td width="284">
<input type="hidden" name="id_user" value="<?=$id_user?>" />   
<input name="name" type="text" id="name"  style="width:40%" value="<?=@$name?>" size="10" maxlength="20">
   - <input name="lastname" type="text" id="lastname" style="width:50%" value="<?=@$lastname?>" size="10" maxlength="20"/></td>
</tr>
<tr>
<td>Username : </td>
<td><input name="user" type="text" id="user"  style="width:35%" value="<?=$user?>" size="10" maxlength="20"></td>
</tr>
<tr>
<td>Password : </td>
<td><input name="password" type="text" id="password"  style="width:35%" value="" size="10" maxlength="20"></td>
</tr>
<tr>
<td>วัน-เดือน-ปี เกิด : </td>
<td><input name="birthday" type="text" id="birthday"  style="width:35%" value="<?=@$birthday?>" size="10" maxlength="20"></td>
</tr>
<tr>
<td>Email : </td>
<td><input name="email" type="text" id="email"  style="width:50%" value="<?=@$email?>" size="10" maxlength="20"></td>
</tr>
<tr>
<td>อนุญาติ : </td>
<td>
<?PHP
if( $user_enable==1 )
{
?>
<input name="user_enable" type="checkbox" value="1" id="user_enable" checked="checked" />
<?PHP
}else
{
?>
<input name="user_enable" type="checkbox" value="1" id="user_enable"  />
<?PHP
}
?>

</td>
</tr>
<tr>
<td>ระดับผู้ใช้ : </td>
<td>
<select name="level_user" id="level_user">
 <option >:: Select ::</option>
 <?PHP
     if( $level_user == 1  )
	 {
 ?>
 <option value="1" selected="selected">Administrator</option>
 <?PHP
     }else
	 {
 ?>
 <option value="1" >Administrator</option>
 <?PHP
     }
 ?>
 
 <?PHP
       if( $level_user == 2  )
	   {
 ?>
  <option value="2" selected="selected">User</option>
  <?PHP
       }else
	   {
  ?>
    <option value="2" >User</option>
  <?PHP
        }
  ?>
  
</select>
</td>

</tr>
<tr>
<td>เลขบัตรประชาชน : </td>
<td><input name="id_card" type="text" id="id_card" style="width:50%" value="<?=@$id_card?>" size="20" maxlength="13" /> </td>
</tr>
<tr>
<td>ที่อยู่ : </td>
<td><input name="address" type="text" value="<?=@$address?>" style="width:70%" id="address" /> </td>
</tr>

<tr>
<td colspan="2" >
<?=nbs(50)?>
<button>Update</button>
<button type="reset">Cancel</button>
</td>
</tr>


</table>

<?=form_close()?>

</body>
</html>
