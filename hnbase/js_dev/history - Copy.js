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
              
        var  win_history=      new Ext.Window(
                        {  
                             title:'บันทึกประวัติพนักงาน'
                             ,url:''
                             ,width:500
                          //   ,height:300
                             ,frame:true
                         //    ,minWidth:350
                            ,bodyStyle:'padding:5px 5px 0'
                           //  ,border:false
                          //   ,layoutConfig:{ animate:true }
                             ,closeAction:'hide'
                             ,constrain:true
                             ,draggable:false
                             ,resizable:true
                             ,fieldDefaults: {
                                                            msgTarget: 'side',
                                                            labelWidth: 75
                                                     }
                             ,defaultType: 'textfield'
                             ,defaults: {
                                           anchor: '100%'
                                               }
                             ,items:[
                                    // panel1
                                    // ,btnsave
                                    {
                                         xtype:'textfield'
                                         ,fieldLabel:'ชื่อ '
                                         ,name:'a'
                                         ,allowBlank:false
                                    } 
                                    ,
                                    {
            fieldLabel: 'First Name',
            name: 'first',
            allowBlank:false
        }
                                  
                                         ]     
                                           ,buttons:[
                                       { 
                                        text:'Save'
                                        ,handler:function()
                                            {
                                                win_history.getForm().submit({
                                                       success:function(f,a)
                                                       {
                                                           
                                                       
                                                       }
                                                })
                                                
                                            }
                                       },
                                       {
                                           text:'Reset'
                                           ,handler:function(){
                                              win_history.getForm().reset(); 
                                           }
                                       }  
                                           ]
                         });
               //win_history.show();
             win_history.render('content_history');
             //##=========================================================
    
          })
      }
  );