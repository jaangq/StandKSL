// VIEWS
cssTransition('body', 'background', 'linear-gradient(to right, #2c3d50, #405e80)');
cssTransition('body', 'background-image', 'url("'+base_url+'assets/img/north-polar.jpg")');

$(document).on('click', '.dot-light', function() {
  $('.left-form').css('background-image', 'url("'+base_url+'assets/img/light-linux.png")');
  $('.form-container').css({'background':'#e6eef0', 'box-shadow':'1px 1px 10px #fff, -1px -1px 10px #696969'});
  cssTransition('body', 'background', 'linear-gradient(to right, #fff, #e6eef0)');
  cssTransition('body', 'background-image', 'url("'+base_url+'assets/img/north-polar.jpg")');
  $('.flash-message-container').hide();
  resetFa();
});
$(document).on('click', '.dot-dark', function() {
  $('.left-form').css('background-image', 'url("'+base_url+'assets/img/dark-linux.png")');
  $('.form-container').css({'background':'#f3f3f3', 'box-shadow':'1px 1px 10px #2c3d50, -1px -1px 10px #1b2d44'});
  cssTransition('body', 'background', 'linear-gradient(to right, #2c3d50, #405e80)');
  cssTransition('body', 'background-image', 'url("'+base_url+'assets/img/north-polar.jpg")');
  $('.flash-message-container').hide();  
  resetFa();
});

// AJAX
$('.anggap-aja-form input, .anggap-aja-form select').keypress(function(e) {
  if(e.which == 13) {
    $('.btn-daftar').click();
  }
})
$(document).on('click', '.btn-daftar', function() {
  let nim = $('#nim').val();
  let fullname = $('#nama').val();
  let email = $('#email').val();
  let no_hp = $('#nohp').val();
  let jk = $('#jk').val();
  let url = base_url+"pendaftaran/daftar";
  if (nim && fullname && email && no_hp && !jk) {
    flashMessage("<p class='alert alert-danger text-center'><strong>Ups.. Maaf.. Harap Pilih Jenis Kelamin-mu</strong></p>");
    return false;
  }
  $.ajax({
   type: "POST",
   url: url,
   data: {nim:nim, fullname:fullname, email:email, no_hp:no_hp, jk:jk},
   // dataType : "html",
   success: function(data) {
        flashMessage(data);
        // console.log(data);
        resetForm();
    },
    error: function(data){
        flashMessage(data);
        // console.log(data);
    },

    });
});

// Validation
function ucwords(str) {
  return (str + '').replace(/^([a-z])|[\s_]+([a-z])/g, function ($1) {
      return $1.toUpperCase();
  })
};

function validGa(text, element, pat, errText) {
  let errMes = '';
  if (element === "#nama") {
    text = ucwords(text);
    $("#nama").val(text);
  }
  text = text.trim();
  let times_logo = $(element).parents(".form-group").find(".fa-times").css('display') === 'block';
  if(!pat.test(text)) {
    errMes = "<p class='alert alert-danger text-center'><strong>" + errText + "</strong></p>";
    if($(element).attr('foc') === 'out') {
      flashMessage(errMes);
    }
    $(element).parents(".form-group").find(".fa-check").hide();
    $(element).parents(".form-group").find(".fa-times").show();
  } else if (pat.test(text)) {
    $(element).parents(".form-group").find(".fa-times").hide();
    $(element).parents(".form-group").find(".fa-check").show();
  }
  if (element !== "#nama") {
    $(element).val(text);
  }
  return pat.test(text);
}

function validGa_nim() {
  let nim = $("#nim").val();
  return validGa(nim, "#nim", /^[0-9]{10}$/i, "Ups.. Maaf.. Format NIM Salah");
}
function validGa_nama() {
  let nama = $("#nama").val();
  return validGa(nama, "#nama", /^[a-zA-Z ]{2,}$/i, "Ups.. Maaf.. Mungkin Format Penulisan Nama Lengkap Salah");
}
function validGa_email() {
  let email = $("#email").val();
  return validGa(email, "#email", /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i, "Ups.. Maaf.. Format Penulisan Email Salah");
}
function validGa_nohp() {
  let nohp = $("#nohp").val();
  return validGa(nohp, "#nohp", /^[0+][0-9]{8,}$/i, "Ups.. Maaf.. Format Nomor HP Salah");
}

$('#nim').keyup(function() {
  validGa_nim();
});
$('#nama').keyup(function() {
  validGa_nama();
});
$('#email').keyup(function() {
  validGa_email();
});
$('#nohp').keyup(function() {
  validGa_nohp();
});

$('#nim').focusout(function() {
  $(this).attr('foc', 'out');
  validGa_nim();
  $(this).removeAttr('foc');
});
$("#nama").focusout(function() {
  $(this).attr('foc', 'out');
  validGa_nama();
  $(this).removeAttr('foc');
});
$('#email').focusout(function() {
  $(this).attr('foc', 'out');
  validGa_email();
  $(this).removeAttr('foc');
});
$('#nohp').focusout(function() {
  $(this).attr('foc', 'out');
  validGa_nohp();
  $(this).removeAttr('foc');
});




// function

function cssTransition(selector, attr, val) {
  $(selector).fadeOut(500, function(){
    $(this).css(attr, val).fadeIn(2000);
  });
}
function flashMessage(data) {
  $('.flash-message-container').hide().html(data).fadeIn();
  setTimeout(function() {
    $('.flash-message-container').fadeOut();
  }, 3000);
}
function validasi() {
  let nim = $('#nim').val();
  let fullname = $('#nama').val();
  let email = $('#email').val();
  let no_hp = $('#nohp').val();
  let jk = $('#jk').val();
}
function resetForm() {
  let nim = $('#nim').val("");
  let fullname = $('#nama').val("");
  let email = $('#email').val("");
  let no_hp = $('#nohp').val("");
  let jk = $('#jk').val("");
  resetFa();
}
function resetFa() {
  $(".fa-check").hide();
  $(".fa-times").hide();
}
