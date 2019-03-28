$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});

function get_login() {
  var tampung_username = document.getElementById('pgw_username').value;
  var tampung_password = document.getElementById('pgw_password').value;
  if (tampung_username == "" && tampung_password == "") {
    alert("Field Login tidak boleh ada yang kosong");
  }
  else if (tampung_username != document.getElementById('pgw_username') && tampung_password != document.getElementById('pgw_password')){
    alert('Cek lagi Username/Password Anda')
  } 
  else {
    alert("Selamat datang : " + tampung_username);
  }
}
