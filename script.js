var sidenav = document.getElementById("mySidenav");

$(document).ready(function(){

    $('.menu-icon').click(function(e){
      e.preventDefault();
      $this = $(this);
      if($this.hasClass('is-opened')){
        $this.addClass('is-closed').removeClass('is-opened');
        sidenav.classList.remove("active");
      }else{
        $this.removeClass('is-closed').addClass('is-opened');
        sidenav.classList.add("active");
      }
    })
});


/* Set the width of the side navigation to 250px */
function openNav() {
  sidenav.classList.add("active");
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  sidenav.classList.remove("active");

}

function validerForm(e) {
    var e = e || window.event;
    var k = e.keyCode || e.which;
    if (k == 13 && !e.shiftKey)
    {
        document.forms["form1"].submit();
    }
}