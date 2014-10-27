Ext.onReady(function() {

 function showResult(btn){
        Ext.example.msg('Button Click', 'You clicked the {0} button', btn);
    };

var fakeHTML = "";
    
	
/*	
var      win1 = Ext.create('widget.window', {
                title: 'Layout Window',
                closable: true,
                closeAction: 'hide',
                width: 600,
                minWidth: 350,
                height: 350,
                layout: {
                    type: 'border',
                    padding: 5
                },
                items: [{
                    region: 'west',
                    title: 'Navigation',
                    width: 200,
                    split: true,
                    collapsible: true,
                    floatable: false
                }, {
                    region: 'center',
                    xtype: 'tabpanel',
                    items: [{
                        title: 'Bogus Tab',
                        html: 'Hello world 1'
                    }, {
                        title: 'Another Tab',
                        html: 'Hello world 2'
                    }, {
                        title: 'Closable Tab',
                        html: 'Hello world 3',
                        closable: true
                    }]
                }]
            });
*/





	 var SamplePanel = Ext.extend(Ext.Panel, {
        width    : 1200,
        height   : 500,
        style    : 'margin-top:-15px',
        bodyStyle: 'padding:10px',
        renderTo : Ext.getBody(),
        html     : fakeHTML,
        autoScroll: true
    });
	 
	 
	 new SamplePanel(
					 
	  {
        title: 'ระบบฐานข้อมูลศูนย์สุขภาพจิตที่ 6 ขอนแก่น',
        tbar: [   //----------------------befgin  tbar
								   '-',
								   {
								xtype:'splitbutton',
								text: 'สร้างเสริมสุขภาพจิต',
								iconCls: 'add16',
								menu: [
									              {
													   text: 'แสดงข้อมูลทั้งหมด',
												    	 iconCls: 'calendar',
														// iconCls: 'icon-user',
														//iconAlign: 'middle',
														scale: 'small',
														handler:function()
														     {
																   // Ext.example.msg('click','you click'); 
																   // Ext.MessageBox.confirm('Confirm', 'Are you sure you want to do that?', showResult);
																    
																	win1.show(this, function() {  //สร้างเสิรมสุขภาพจิต
     																			         //  button.dom.disabled = false;
         																										     }
																					   );
															 }
													  
														
												  }
												  ,
												  {
													    text: 'ค้นหาข้อมูล',
												    	 iconCls: 'calendar',
														// iconCls: 'icon-user',
														iconAlign: 'middle',
														scale: 'small',
														menu:[ 
															           { 
																	        text:'ค้นหาจากจังหวัด' 
																	   }
																	   ,
																	   {
																		     text:'ค้นหาจากอำเภอ' 
																	   }
																	   	,																   ,
																	   {
																		     text:'ค้นหาจากตำบล' 
																	   }
                                                                        ,
																		 {
																		     text:'ค้นหาจากชื่อหมู่บ้าน' 
																	     }

																	]
												  }
												  ,
												  	  {
													    text: 'รายงานข้อมูลทางสถิติ',
												    	 iconCls: 'calendar',
														// iconCls: 'icon-user',
														iconAlign: 'middle',
														scale: 'small',
														menu:[ 
															           { 
																	        text:'จำนวนหมู่บ้านในเขตรับผิดชอบ' 
																	   }

																	]
												  }
												,
													 {
													    text: 'บริหารจัดการข้อมูล',
												    	 iconCls: 'calendar',
														// iconCls: 'icon-user',
														iconAlign: 'middle',
														scale: 'small',
														menu:[
															             {
																			  text:'เพิ่มข้อมูล' 
																		 }
																		 ,
																		  {
																			  text:'ปรับปรุงข้อมูล/ลบข้อมูล' 
																		 }

															       ]
												  }

												  
											]
									 }
								         ,'-',
								   {
								xtype:'splitbutton',
								text: 'MCATT',
								iconCls: 'add16',
								menu: [
									              {
													    text: 'แสดงข้อมูลทั้งหมด',
														 iconCls: 'calendar'
												  }
										    ]
									 }
										  ,'-',
									  {
								xtype:'splitbutton',
								text: 'ชมรมผู้สูงอายุ',
								iconCls: 'add16',
								menu: [
									              {
													    text: 'แสดงข้อมูลทั้งหมด',
														 iconCls: 'calendar'
												  }
										    ]
									 }
	 									   ,'-',
									 {
								xtype:'splitbutton',
								text: 'การประเมินตนเอง 5 ด้าน',
								iconCls: 'add16',
								menu: [
									              {
													    text: 'แสดงข้อมูลทั้งหมด',
														 iconCls: 'calendar'
												  }
										    ]
									 }
										   ,'-',
									 {
								xtype:'splitbutton',
								text: 'TOBENUMBERONE',
								iconCls: 'add16',
								menu: [
									              {
													    text: 'แสดงข้อมูลทั้งหมด',
														 iconCls: 'calendar'
												  }
										    ]
									 }
	  										   ,'-',
									 {
								xtype:'splitbutton',
								text: 'ผู้ดูแลระบบ (Administrator)',
								iconCls: 'add16',
								menu: [
									              {
													    text: 'ผู้ใช้งานทั้งหมด (User)',
														iconCls: 'add16',
												  }
												  ,
												  	  {
													    text: 'ค้นหาผู้ใช้งาน (Search)',
														iconCls: 'add16',
												  }

										    ]
									 }
		  							  ,'-',
								{
										xtype:'buttongroup',
													items: [{
														text: 'เข้าสู่ระบบ',
														 iconCls: 'calendar',
														scale: 'small'  
															}]
				                 }		
								 	  ,'-',
								 								{
										xtype:'buttongroup',
													items: [{
														text: 'ออกจากระบบ',
														 iconCls: 'calendar',
														scale: 'small' ,
														handler:function()
																		  {
																				 Ext.MessageBox.confirm('แจ้งสถานะ', 'คุณต้องการออกจากระบบ', showResult);
																		  }
															}]
				                 }		  

								
/*		//เอาไว้ใข้ในกรณีของการเพิ่ม function ให้ปุ่ม  menu
		{
            xtype:'splitbutton',
            text: 'Cut',
            iconCls: 'add16',
            menu: [{text: 'Cut Menu Item'}]
        }
		,
		{
            text: 'Copy',
            iconCls: 'add16'
        }
		,
		{
            text: 'Paste',
            iconCls: 'add16',
            menu: [{text: 'Paste Menu Item'}]
        }
		,'-',
		{
            text: 'Format',
            iconCls: 'add16'
        }
*/		
		
		
		]   //------------end tbar
		
		
/*		,    //buttom  bar  เอาไว้ในกรณีของ ปุ่มการทำงานไม่พอ
bbar: [{
                iconCls: 'add16',
                text: 'Button 3'
            },
            '-',
            {
                iconCls: 'add16',
                text: 'Button 4'
            },{
                iconCls: 'add16'
            },{
                iconCls: 'add16'
            },
            '-',
            {
                iconCls: 'add16',
                text: 'Button 5',
                menu: [
                    { text: "Menu Item 1" }
                ]
            }
        ]
*/



		
    });
					 
					 });