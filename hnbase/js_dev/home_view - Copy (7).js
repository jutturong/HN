Ext.require([
    'Ext.form.field.ComboBox',
    'Ext.form.FieldSet',
    'Ext.tip.QuickTipManager',
    'Ext.data.*'
]);

Ext.onReady(function() {
/*function showResult(btn){
        Ext.example.msg('Button Click', 'You clicked the {0} button', btn);
    };
*/	
//###==================  ประวัติพนักงาน (Person)================================
var      insert_person={   //begin   insert_person    //เพิ่มข้อมูลประวัติพนักงาน (Insert data)
													   text: 'เพิ่มข้อมูลประวัติพนักงาน (Insert data)',
												    	// iconCls: 'calendar',
													    // iconCls: 'icon-user',
														//iconAlign: 'middle',
														scale: 'small',
														handler:function()
														     {
																   // Ext.example.msg('click','you click'); 
																   // Ext.MessageBox.confirm('Confirm', 'Are you sure you want to do that?', showResult);
																	  // win1a.show();
																	  win_person.show();
																	// win_person1a.show();
/*																	win_person.show(this, function() 
																													   {  //สร้างเสิรมสุขภาพจิต						   
																															button.dom.disabled = false;
																													   }
																					                  );
*/																	
																	
																	
																	
															 }
												  }//end   insert_person
												  
var panel1 =     {
            fieldLabel: 'First Name',
            name: 'first',
            allowBlank:false
        }

var panel2=     {
  xtype : 'panel',
  title : 'Plain Panel',
  html  : 'Panel with an xtype specified'
}


var form = Ext.create('Ext.form.Panel', {
        border: false,
        fieldDefaults: {
            labelWidth: 55
        },
        url: 'save-form.php',
        defaultType: 'textfield',
        bodyPadding: 5,

        items: [{
            fieldLabel: 'Send To',
            name: 'to',
            anchor:'100%'  // anchor width by percentage
        },{
            fieldLabel: 'Subject',
            name: 'subject',
            anchor: '100%'  // anchor width by percentage
        }, {
            xtype: 'textarea',
            hideLabel: true,
            name: 'msg',
            anchor: '100% -47'  // anchor width by percentage and height by raw adjustment
        }]
    });


var    win_person1a = Ext.create('Ext.window.Window', {
        title: 'Resize Me',
        width: 500,
        height:300,
        minWidth: 300,
        minHeight: 200,
        layout: 'fit',
        plain: true,
        items: form,

        buttons: [{
            text: 'Send'
        },{
            text: 'Cancel'
        }]
    });



//##=== combobox==========
var states = Ext.create('Ext.data.Store', {
        fields: ['abbr', 'name'],
        data : [
							{"abbr":"AL","name":"Alabama","slogan":"The Heart of Dixie"},
							{"abbr":"AK","name":"Alaska","slogan":"The Land of the Midnight Sun"},
							{"abbr":"AZ","name":"Arizona","slogan":"The Grand Canyon State"},
							{"abbr":"AR","name":"Arkansas","slogan":"The Natural State"},
							{"abbr":"CA","name":"California","slogan":"The Golden State"},
							{"abbr":"CO","name":"Colorado","slogan":"The Mountain State"},
							{"abbr":"CT","name":"Connecticut","slogan":"The Constitution State"},
							{"abbr":"DE","name":"Delaware","slogan":"The First State"},
							{"abbr":"DC","name":"District of Columbia","slogan":"The Nation's Capital"},
							{"abbr":"FL","name":"Florida","slogan":"The Sunshine State"},
							{"abbr":"GA","name":"Georgia","slogan":"The Peach State"},
							{"abbr":"HI","name":"Hawaii","slogan":"The Aloha State"},
							{"abbr":"ID","name":"Idaho","slogan":"Famous Potatoes"},
							{"abbr":"IL","name":"Illinois","slogan":"The Prairie State"},
							{"abbr":"IN","name":"Indiana","slogan":"The Hospitality State"},
							{"abbr":"IA","name":"Iowa","slogan":"The Corn State"},
							{"abbr":"KS","name":"Kansas","slogan":"The Sunflower State"},
							{"abbr":"KY","name":"Kentucky","slogan":"The Bluegrass State"},
							{"abbr":"LA","name":"Louisiana","slogan":"The Bayou State"},
							{"abbr":"ME","name":"Maine","slogan":"The Pine Tree State"},
							{"abbr":"MD","name":"Maryland","slogan":"Chesapeake State"},
							{"abbr":"MA","name":"Massachusetts","slogan":"The Spirit of America"},
							{"abbr":"MI","name":"Michigan","slogan":"Great Lakes State"},
							{"abbr":"MN","name":"Minnesota","slogan":"North Star State"},
							{"abbr":"MS","name":"Mississippi","slogan":"Magnolia State"},
							{"abbr":"MO","name":"Missouri","slogan":"Show Me State"},
							{"abbr":"MT","name":"Montana","slogan":"Big Sky Country"},
							{"abbr":"NE","name":"Nebraska","slogan":"Beef State"},
							{"abbr":"NV","name":"Nevada","slogan":"Silver State"},
							{"abbr":"NH","name":"New Hampshire","slogan":"Granite State"},
							{"abbr":"NJ","name":"New Jersey","slogan":"Garden State"},
							{"abbr":"NM","name":"New Mexico","slogan":"Land of Enchantment"},
							{"abbr":"NY","name":"New York","slogan":"Empire State"},
							{"abbr":"NC","name":"North Carolina","slogan":"First in Freedom"},
							{"abbr":"ND","name":"North Dakota","slogan":"Peace Garden State"},
							{"abbr":"OH","name":"Ohio","slogan":"The Heart of it All"},
							{"abbr":"OK","name":"Oklahoma","slogan":"Oklahoma is OK"},
							{"abbr":"OR","name":"Oregon","slogan":"Pacific Wonderland"},
							{"abbr":"PA","name":"Pennsylvania","slogan":"Keystone State"},
							{"abbr":"RI","name":"Rhode Island","slogan":"Ocean State"},
							{"abbr":"SC","name":"South Carolina","slogan":"Nothing Could be Finer"},
							{"abbr":"SD","name":"South Dakota","slogan":"Great Faces, Great Places"},
							{"abbr":"TN","name":"Tennessee","slogan":"Volunteer State"},
							{"abbr":"TX","name":"Texas","slogan":"Lone Star State"},
							{"abbr":"UT","name":"Utah","slogan":"Salt Lake State"},
							{"abbr":"VT","name":"Vermont","slogan":"Green Mountain State"},
							{"abbr":"VA","name":"Virginia","slogan":"Mother of States"},
							{"abbr":"WA","name":"Washington","slogan":"Green Tree State"},
							{"abbr":"WV","name":"West Virginia","slogan":"Mountain State"},
							{"abbr":"WI","name":"Wisconsin","slogan":"America's Dairyland"},
							{"abbr":"WY","name":"Wyoming","slogan":"Like No Place on Earth"}
        ]
    });

Ext.define('modelloAC', {
    extend: 'Ext.data.Model',
    fields: [
        { name: 'telaio' }
    ]
});


Ext.regModel('State', {
    fields: [
        {type: 'string', name: 'abbr'},
        {type: 'string', name: 'name'},
        {type: 'string', name: 'slogan'}
    ]
});



var autoCompleteStore = Ext.create('Ext.data.Store', {
    model: modelloAC,
    autoLoad: true,
    proxy: {
        type: 'ajax',
        //url: 'script/request.php?operazione=gettelai',
		url: 'index.php/home/test_json',
	//url: 'states',
        reader: {
            type: 'json',
            root: 'telai',
            totalProperty: 'results'
        }
    }
});

//##=== combobox==========


var    win_person= new Ext.Window({
  		url:'',
        frame:true,
        title: 'เพิ่มข้อมูลประวัติพนักงาน (Insert data)',
        bodyStyle:'padding:5px 5px 0',
        width: 500,
		height:300,
        fieldDefaults: {
            msgTarget: 'side',
            labelWidth: 75
        },
        defaultType: 'textfield',
        defaults: {
            anchor: '100%'
        },
  items : [ 
//					Ext.create('Ext.form.field.ComboBox',{
//					  forceSelection:true,
//					   fieldLabel: 'คำนำหน้าชื่อ ',
//					  hideTrigger: false, 
//					   typeAhead: true ,
//					   triggerAction: 'query' ,
//					    emptyText: 'select ...', 
//						 allowBlank: true,
//						 editable: false, 
//					     store: ['Red', 'Yellow', 'Green', 'Brown', 'Blue', 'Pink', 'Black'] ,
//					  })
		  
//		  {
//									xtype:'combo',
//								   fieldLabel:'คำนำหน้าชื่อ ',
//								   name:'division',
//								   queryMode:'local',
//								   store:['ด.ช.','นาย','นาง','น.ส.'],
//								   displayField:'division',
//								   autoSelect:true,
//								   forceSelection:true  
//		   }

					
					Ext.create('Ext.form.ComboBox', {
								fieldLabel: 'Choose State',
							store: states,
								queryMode: 'local',
								displayField: 'name',
								valueField: 'abbr',
								 width: 320,
								  labelWidth: 130,
								   queryMode: 'local',
								   typeAhead: true
								//renderTo: Ext.getBody()
							})
						
//					{	
//						xtype: 'combo',
//    name: 'telaio',
//   //hideTrigger: true,
//   store: autoCompleteStore,
//   typeAhead: true,
//   queryMode: 'remote',
//   fieldLabel: 'Telaio'
//					}
					,			
		{			
            fieldLabel: 'First Name',
            name: 'first',
            allowBlank:false
        }
		,{
            fieldLabel: 'Last Name',
            name: 'last'
        },{
            fieldLabel: 'Company',
            name: 'company'
        }, {
            fieldLabel: 'Email',
            name: 'email',
            vtype:'email'
        }, {
            xtype: 'timefield',
            fieldLabel: 'Time',
            name: 'time',
            minValue: '8:00am',
            maxValue: '6:00pm'
        } ],
				  buttons: [{
							text: 'Save'
						},{
							text: 'Cancel'
						}]
});

var      win1 = Ext.create('widget.window', {
                title: 'Layout Window',
                closable: true,
                closeAction: 'hide',
                width: 600,
                minWidth: 350,
                height: 350,
                layout: 'border',
                bodyStyle: 'padding: 5px;',
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
												  
var      insert_person_other={   //begin   insert_person    //เพิ่มข้อมูลประวัติพนักงาน (Insert data)
													   text: 'เพิ่มข้อมูลประวัติอื่นที่เกียวข้องของพนักงาน (Insert data)',
												    	 //iconCls: 'calendar',
														// iconCls: 'icon-user',
														//iconAlign: 'middle',
														 iconCls: 'bmenu',
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
												  }//end   insert_person												  
												  
var    search_person= {
													    text: 'ค้นหาข้อมูล',
												    	 iconCls: 'calendar',
														// iconCls: 'icon-user',
														iconAlign: 'middle',
														scale: 'small',
														menu:[ 
															           { 
																	        text:'ค้นหาประวัติพนักงาน' 
																	   }
																	   ,
																	   {
																		     text:'ประวัติอื่นที่เกียวข้องของพนักงาน' 
																	   }
																	  // 	,																   ,
//																	   {
//																		     text:'ค้นหาจากตำบล' 
//																	   }
//                                                                        ,
//																		 {
//																		     text:'ค้นหาจากชื่อหมู่บ้าน' 
//																	     }
																	]
												  }
												  
var    report_person={
													    text: 'รายงานข้อมูลทางสถิติ',
												    	 iconCls: 'calendar',
														// iconCls: 'icon-user',
														iconAlign: 'middle',
														scale: 'small',
														menu:[ 
															           { 
																	          text:'รายงานประวัติพนักงาน' 
																	   }
																	   ,
																	   {
																		     text:'รายงานประวัติอื่นที่เกียวข้องของพนักงาน' 
																	   }

																	]
												  }												  
//###==================  ประวัติพนักงาน (Person)================================
												  
												  
var fakeHTML = "";
	 var SamplePanel = Ext.extend(Ext.Panel, {
        width    : 1200,
        height   : 500,
        style    : 'margin-top:-15px',
        bodyStyle: 'padding:10px',
        renderTo : Ext.getBody(),
        html     : fakeHTML,
        autoScroll: true
    });
	 new       SamplePanel(
	  {
        title: 'HN system  ระบบฐานข้อมูลบคลากร',
        tbar: [   //----------------------befgin  tbar
								   '-',
								   {
								xtype:'splitbutton',
								text: 'ประวัติพนักงาน (Person)',
								iconCls: 'add16',
								menu: [
									                    insert_person,   //เพิ่มข้อมูลประวัติพนักงาน (Insert data)
														insert_person_other,   //เพิ่มข้อมูลประวัติพนักงาน (Insert data)
												        search_person,  //  ค้นหาข้อมูล
												        report_person     // report
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
		]   //------------end tbar
    });
					 });