// JavaScript Document
Ext.require([
    'Ext.form.*',
    'Ext.layout.container.Column',
    'Ext.tab.Panel'
]);
   

Ext.onReady(function()
      { 
          //alert('t'); 
      
          Ext.get('history').on('click',function(e)
          {
              //alert('t'); 
             //##=========================================================
               var  panel1={
                   region:'center'
                                     ,title:'HN system database'
                                     ,width:400
                                     ,split:true
                                     ,collapsible:true
                                     ,floatable:false
                                    
               }
              
              var btnsave=new Ext.Button({
                  title:'hide me'
                 ,handler:function(){ alert('t'); }
              });
             //##================body=========================
			 var  fr_history=Ext.create('Ext.form.Panel',{   //begin
										url:'',
										frame:true,
										title:'กรอกประวัติพนักงาน',
										bodyStyle:'padding:5px 5px 0',
										width: 350,
										fieldDefaults: {
											msgTarget: 'side',
											labelWidth: 75
      															  },
										defaultType: 'textfield',
    										    defaults: {
           										 anchor: '100%'
      															  },						  
										 items: [{
														fieldLabel: 'First Name',
														name: 'first',
														allowBlank:false
													},{
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
													}] ,
										 buttons: [{
															text: 'Save'
														},{
															text: 'Cancel'
														}]
										});//end
			       fr_history.render('content_history');
          })
      }
  );