   let pages =0;
   let perpage;
   let totalpages;
    $(document).ready(function(){
      load(handler);
      
   })
   $( "#search" ).click(function() {
      
      pages = parseInt($('#distinctpage').val());
      console.log(pages);
      if(pages > totalpages){
         pages = totalpages;
      }
      if(pages <= 0){
         pages =1;
      }
      pages--;
      load(handler);
      
   });
   $( "#left" ).click(function() {
      if(pages ==0 ){
         return;
      }
      if(pages > totalpages){
         pages = totalpages;
      }
      if(pages < 0){
         pages =1;
      }
      pages--;
      load(handler);
      
   });
   $( "#right" ).click(function() {
      if(pages+1 >= totalpages ){
         return;
      }
      if(pages > totalpages){
         pages = totalpages;
      }
      if(pages < 0){
         pages =1;
      }
      pages++;
      load(handler);
      
   });

   function load(handler){
      
      $("#loading").css("display","table-cell");
      console.log("PAGE AT : "+ pages);
      console.log("PERPAGE :"+perpage);
      console.log("TOTAL :"+totalpages);
      
      $.ajax(
       {
         type :"POST",
         url: handler+".php",
         data: {'page':pages,id},
         dataType : "json",
         success: function(data) {
            // console.log(data);
            
            if(data['error']){
               console.log("Something");
               
            }
            else if(data['data'].length > 0){
               show(data['data']);
               
               perpage = data['perpage'];
               totalpages = Math.ceil(data['count'].count/data['perpage']);
               console.log(totalpages);
      
                $("#showpages").html(totalpages);
               
            }else{
               $("#list").html("<h1  style=' display: table-cell; margin:0 auto;  vertical-align:middle; text-align:center'>No Data Found</h1>");
               
            }
            $('#searchbox').empty();
            $('#searchbox').append(' <input id="distinctpage" maxlength="2" size= "5" type="number" name="page" value="'+ (pages +1 ) +'">');
            $("#loading").css("display","none");
           
         },
         error: function(XMLHttpRequest, textStatus, errorThrown) { 
            alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            console.log(XMLHttpRequest);
            
            $("#loading").css("display","none");
         }   
      }); 
   }
   
 