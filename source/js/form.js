$(document).ready(function(){

  $('input#button-create').on('click', function() {
    var create_alias = $('input#create_alias').val()
    var create_url = $('input#create_url').val()
    if ($.trim(create_url !== '')) {
      $.get('pages/create.php', {create_url: create_url, create_alias: create_alias}, function(data) {
        var response = jQuery.parseJSON(data);
        switch (response.state) {


          case 0:
            document.getElementById("myModalHeader").style.backgroundColor = "red";
            $('p#modal_text_1').text("You haven't entered an URL address!");
            $('p#modal_text_2').text("");
            document.getElementById('modal-success-link').innerHTML=""
            document.getElementById('modal-success-link').href=""
            var modal = document.getElementById('myModal');

            break;


          case 1:
            document.getElementById("myModalHeader").style.backgroundColor = "#3cb879";
            $('p#modal_text_1').text("Your URL has been created succesfully!");
            $('p#modal_text_2').text("You can access the page with the following link:");
            document.getElementById('modal-success-link').innerHTML="https://url.audiovisuaali.net/"+response.alias
            document.getElementById('modal-success-link').href="https://url.audiovisuaali.net/"+response.alias
            var modal = document.getElementById('myModal');
            modal.style.display = "block";
            break;


          case 2:
            document.getElementById("myModalHeader").style.backgroundColor = "red";
            $('p#modal_text_1').text("Given alias already exists!");
            $('p#modal_text_2').text("");
            document.getElementById('modal-success-link').innerHTML=""
            document.getElementById('modal-success-link').href=""
            var modal = document.getElementById('myModal');
            modal.style.display = "block";
            break;


          case 3:

            document.getElementById("myModalHeader").style.backgroundColor = "#3cb879";
            $('p#modal_text_1').text("Your URL has been created succesfully!");
            $('p#modal_text_2').text("You can access the page with the following link:");
            document.getElementById('modal-success-link').innerHTML="https://url.audiovisuaali.net/"+response.alias
            document.getElementById('modal-success-link').href="https://url.audiovisuaali.net/"+response.alias
            var modal = document.getElementById('myModal');
            modal.style.display = "block";
            break;


          default:
          document.getElementById("myModalHeader").style.backgroundColor = "red";
          $('p#modal_text_1').text("Unkown error!");
          $('p#modal_text_2').text("");
          document.getElementById('modal-success-link').innerHTML=""
          document.getElementById('modal-success-link').href=""
          var modal = document.getElementById('myModal');
          modal.style.display = "block";
          break;
        }
      });
    }
  });


  $('input#button-goto').on('click', function() {
    var create_alias = $('input#goto_url').val()
    if ($.trim(create_url !== '')) {
      window.location.replace("./"+create_alias);
    }
  });


  $('button#myBtn').on('click', function() {
    var modal = document.getElementById('myModal');
    modal.style.display = "block";
  });


  $('input#sssbutton-create').on('click', function() {
    var modal = document.getElementById('myModal');
    modal.style.display = "none";
  });


  var modal = document.getElementById('myModal');
  window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
  }


  $(function() {
    $('input').on('change', function() {
      var input = $(this);
      if (input.val().length) {
        input.addClass('populated');
      } else {
        input.removeClass('populated');
      }
    });

    setTimeout(function() {
      $('#fname').trigger('focus');
    }, 500);
  });


});
