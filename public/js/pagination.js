

function callForPagination(resp){


   var noOfLinks=resp.total/resp.per_page;
   var cp=resp.current_page;
   var lp=resp.last_page;
      var linkSelect=$("body #pagg ul");
      var activeLink=parseInt(linkSelect.find("li.active").text());
      linkSelect.find("li.active").removeClass("active");

        $("body #pagg ul li").remove();
            var lAdjuster=0;
            var uAdjuster=0;
            if(cp>1){
              lAdjuster=cp>5?5:cp-1;
            }
            if(lp>cp){
              uAdjuster=(lp-cp)>5?5:(lp-cp);

            }
       for(var i=cp-lAdjuster;i<=cp+uAdjuster;i++)
           {
      linkSelect.append("<li><a href='javascript:void(0)' onclick='page(event,"+lp+")'>"+i+"</a></li>");

       }
      if(activeLink==0){

        linkSelect.find("li:eq(1)").addClass("active");

      } else{
         linkSelect.children().find("a:contains("+resp.current_page+")").filter(function(){

          return $(this).text()==resp.current_page;
        }).parent().addClass("active");
      } var activeLink=parseInt(linkSelect.find("li.active").text());
      if(activeLink!=1){
      linkSelect.prepend("<li><a href='javascript:void(0)' onclick='page(event,"+lp+")'>Prev</a></li>");
        }else{
          linkSelect.prepend("<li><a href='javascript:void(0)' onclick='page(event,"+lp+")'>Prev</a></li>");
        }
        if(activeLink!=resp.last_page){
       linkSelect.append("<li><a href='javascript:void(0)' onclick='page(event,"+lp+")'>Next</a></li>");
     }else{
       linkSelect.append("<li><a href='javascript:void(0)' onclick='page(event,"+lp+")'>Next</a></li>");
     }
     if(lAdjuster==5){
         linkSelect.prepend("<li><a href='javascript:void(0)' onclick='page(event,"+lp+")'>1</a></li>");

     }
     if(uAdjuster==5){
        linkSelect.append("<li><a href='javascript:void(0)' onclick='page(event,"+lp+")'>"+lp+"</a></li>");
     }
     if(resp.from==null && resp.to==null){
       var info="<div id='entriesinfo' style='float:left'>No Records Found.</div>"
        $('body #table #entriesinfo').empty();
       $("#table").append(info);
     }else{
    var info="<div id='entriesinfo' style='float:left'>Showing "+resp.from+" to "+resp.to+ " from " +resp.total+" entries.</div>"
     $('body #table #entriesinfo').empty();
    $("#table").append(info);
   }
return true;
}

 function page(e,last){
 e.preventDefault();
  var entry=$("#selectentry").val();
  var sort=$("#selectsort").val();
  var page=e.target.text;
var index= $("body #pagg ul li.active").text();
if(page==="Prev"){

  if(index=="1"){return true;}
  else{
  index--;

  page=index;
}}
if(page==="Next"){
  if(index==last){
    return true;
  }
else{
  index++;

  page=index;
}}
var path=window.location.href.split('/');
if(path.length==5){
   var path=path[path.length-1];
}else{
 var path1=path[path.length-2];
 var path2=path[path.length-1];
 var path=path1+"/"+path2;
}
 // console.log(path); 
 
if(path==""){
  // alert("ddd");
$.ajax({

    method:'get',
    url:baseUrl+"/dashboard/borrowlist?entry="+entry+"&page="+page+"&sort="+sort+"&search="+$("#searchfill").val(),
    success:function(response){
        createTable(response);



    },
    fail:function(){
        alert("failed");
    }
});

}
 else if(path=="booksearch"){
$.ajax({

    method:'get',
    url:baseUrl+"/"+path+"/list?entry="+entry+"&page="+page+"&sort="+sort+"&search="+$("#searchfill").val()+"&type="+$("#type").val()+"&title="+$("#book_name").val()+"&isbn="+$("#isbn").val()+"&author="+$("#author").val()+"&keywords="+$("#keywords").val()+"&publisher="+$("#publisher").val(),
    success:function(response){
        createTable(response);



    },
    fail:function(){
        alert("failed");
    }
});

}
else if(path=="usersearch"){
$.ajax({

    method:'get',
    url:baseUrl+"/"+path+"/list?entry="+entry+"&page="+page+"&sort="+sort+"&search="+$("#searchfill").val()+"&criteria="+$("#criteria").val()+"&value="+$("#value").val(),
    success:function(response){
        createTable(response);



    },
    fail:function(){
        alert("failed");
    }
});

}
else{
  // alert("jello");
  $.ajax({

    method:'get',
    url:baseUrl+"/"+path+"/list?entry="+entry+"&page="+page+"&sort="+sort+"&search="+$("#searchfill").val(),
    success:function(response){
        createTable(response);



    },
    fail:function(){
        alert("failed");
    }
});

}
}




