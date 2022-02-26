  var config = {
    apiKey: "AIzaSyCo4BLTyHmEkuYpsrHmX9jdjJZbl1dGrbU",
    authDomain: "washmandu-85033.firebaseapp.com",
    databaseURL: "https://washmandu-85033.firebaseio.com",
    storageBucket: "washmandu-85033.appspot.com"
  };
  firebase.initializeApp(config);

  var database = firebase.database();

var orderId = function() {
  return 'WM' + Math.random().toString(36).substr(2, 16);
};


function placeOrder() {
    if(grecaptcha.getResponse() == "") {
        return false;
  } else {
      saveOrderDetails();
  }
}


function saveOrderDetails() {
    var garmentType = $('#garmentType').val();
    var serviceType = $('#serviceType').val();
     var generator = new IDGenerator();
         orderId = generator.generateID();
    var today = new Date();
  firebase.database().ref('WMOrders/' + orderId).set({
       order_date: today.getFullYear()+"/"+(today.getMonth()+1)+"/"+today.getDate(),
       orderTimeStamp:today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds(),
       orderId:orderId.toString(),
       garmentType:garmentType.toString(),
       serviceType:serviceType.toString() ,
       cloth_quantity: document.getElementById("cloth_quantity").value,
       cust_name: document.getElementById("cust_name").value,
       cust_email: document.getElementById("cust_email").value,
       cust_phone: document.getElementById("cust_phone").value,
       pickup_date: document.getElementById("pickup_date").value,
       time_slot: document.getElementById("time_slot").value,
       address: document.getElementById("address").value +"," + document.getElementById("city").value,
       status:"PLACED",
       cloth_weight:"",
       compensation:"",
       delivery_date:"",
       orderTimeInMilliSecs:Math.floor(Date.now()),
       payment_received:"",
       reward:"",
       staff_assigned:"",
       tag_no:""
       //city: document.getElementById("city").value,
       //captcha: grecaptcha.getResponse()
  },function(error) {
  if (error) {
    swal("Something went wrong!", "Please try again later", "warning");
  } else {
    swal("Your order ["+ orderId +"] is successully placed!", "You will receive confirmation mail shortly. Thank you.", "success");
      document.getElementById("order_form").reset();
      grecaptcha.reset();
  }
});
}

var verifyRecaptchaCallback = function() {
	if (window.innerWidth < 768 && (/iPhone|iPod/.test(navigator.userAgent) && !window.MSStream)) {
         var destElementOffset = $('#showCaptchaOnIOS-area').offset().top;
    $('html, body').animate({scrollTop: destElementOffset }, 500)
	}
}

function IDGenerator() {
	 
  this.length = 3;
  this.timestamp = +new Date;
  
  var getRandomInt = function( min, max ) {
     return Math.floor( Math.random() * ( max - min + 1 ) ) + min  ;
  }
  
  this.generateID = function() {
      var ts = this.timestamp.toString();
      var parts = ts.split( "" ).reverse();
      var today = new Date();
      var year =today.getFullYear().toString().substr(-2);
      var month =((today.getMonth()+1)).toString().length === 1 ? ("0"+(today.getMonth()+1).toString()):(today.getMonth()+1).toString();
      var day = (today.getDate()).toString().length ===1 ? ("0"+(today.getDate()).toString()):(today.getDate()).toString();
      var id = 'WM' + year+''+month+''+day;

      for( var i = 0; i < this.length; ++i ) {
         var index = getRandomInt( 0, parts.length - 1 );
         id += parts[index];	 
      }
      return id;
  }    

}