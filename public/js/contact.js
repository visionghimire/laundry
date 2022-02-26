function sendMessage() {
        if(grecaptcha.getResponse() == "") {
            alert("captcha : "+grecaptcha.getResponse());
        return false;
  } else {
      alert("hiii");
   //document.getElementById("order_btn").disabled = false;
      $('contact_btn').prop('disabled', false);
      sendContactMail();
  }
 
}

function sendContactMail(){
    var contactDetail = {
       contact_fullname: document.getElementById("contact_fullname").value,
       contact_email: document.getElementById("contact_email").value,
       contact_message: document.getElementById("contact_message").value,
      captcha: grecaptcha.getResponse()
    
    }

    $.ajax({
        type: "POST",
        url: "contact.php",
        data:contactDetail,
        success : function(data){
            if (data.status == "success"){
               swal("We have received your Message. Ref No: "+ data.referenceNo +"", "We will contact you soon. Thank you.", "success");
                document.getElementById("contact_form").reset();
                 grecaptcha.reset();
            }else{
             swal("Something went wrong!"+ data.referenceNo, "Please try again later", "warning");
            }
        }
    });
}