// JavaScript Document
					  function  progress_bar(title_text,status_text)
					  {   
													Ext.MessageBox.show({
													  // title: 'กรุณารอสักครู่',
													    title: title_text,
													  // msg: 'กำลังบันทึกข้อมูล',
													    msg: status_text,
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
																//Ext.example.msg('เสร็จสมบูรณ์', 'บันทึกข้อมูลแล้ว');
																//Ext.example.msg(title_text,status_text);
															}else{
																var i = v/11;
																Ext.MessageBox.updateProgress(i, Math.round(100*i)+'% ประมวลผล');
															}
													   };
												   };
												   for(var i = 1; i < 13; i++){
													   setTimeout(f(i), i*500);
												   }
						}
					  
