$(document).ready(function () {

  $('#navbar').bind('click', function () {
    $('#navbar').removeClass("test");

    $(this).addClass("test");
  });







  var i = 1;
  var j = 1;
  var k = 1;
  var l = 1;
  var m = 1;

  // Fonction pour tout supprimer grâce au bouton sur le formulaire
  $('#effacer').click(function () {
    i = 1;
    j = 1;
    k = 1;
    l = 1;
    m = 1;
    $("select[id^='heure']").fadeOut("slow");
    $("button[id^='heure']").fadeOut("slow");
  });

  //Permet de masquer les heures déjà selectionnées dans un même jour 

  (function () {
    var previous;

    $("select[id^='jour']").on('focus', function () {


      previous = $(this).children("option:selected").val();
    }).change(function () {

      $("select[id^='jour'] option[value=" + previous + "]").show();

      var value = $(this).children("option:selected").val();
      if (value != 0) {


        $("select[id^='jour'] option[value=" + value + "]").hide();
      }
      previous = this.value;
    });
  })();


  (function () {
    var previous;

    $("select[id^='heure0']").on('focus', function () {


      previous = $(this).children("option:selected").val();
    }).change(function () {

      $("select[id^='heure0'] option[value=" + previous + "]").show();

      var value = $(this).children("option:selected").val();

      if (value != 0) {

        $("select[id^='heure0'] option[value=" + value + "]").hide();
      }
      previous = this.value;
    });
  })();

  (function () {
    var previous;

    $("select[id^='heure1']").on('focus', function () {


      previous = $(this).children("option:selected").val();
    }).change(function () {

      $("select[id^='heure1'] option[value=" + previous + "]").show();

      var value = $(this).children("option:selected").val();

      if (value != 0) {

        $("select[id^='heure1'] option[value=" + value + "]").hide();
      }
      previous = this.value;
    });
  })();

  (function () {
    var previous;

    $("select[id^='heure2']").on('focus', function () {


      previous = $(this).children("option:selected").val();
    }).change(function () {

      $("select[id^='heure2'] option[value=" + previous + "]").show();

      var value = $(this).children("option:selected").val();

      if (value != 0) {

        $("select[id^='heure2'] option[value=" + value + "]").hide();
      }
      previous = this.value;
    });
  })();

  (function () {
    var previous;

    $("select[id^='heure3']").on('focus', function () {


      previous = $(this).children("option:selected").val();
    }).change(function () {

      $("select[id^='heure3'] option[value=" + previous + "]").show();

      var value = $(this).children("option:selected").val();

      if (value != 0) {

        $("select[id^='heure3'] option[value=" + value + "]").hide();
      }
      previous = this.value;
    });
  })();

  (function () {
    var previous;

    $("select[id^='heure4']").on('focus', function () {


      previous = $(this).children("option:selected").val();
    }).change(function () {

      $("select[id^='heure4'] option[value=" + previous + "]").show();

      var value = $(this).children("option:selected").val();

      if (value != 0) {

        $("select[id^='heure4'] option[value=" + value + "]").hide();
      }
      previous = this.value;
    });
  })();




// Permet d'afficher les plages horaires quand un jour est selectionné 

  $('#jour0').change(function () {


    $("select[id^='heure00']").fadeIn("slow");
    $("button[id^='heure0']").fadeIn("slow");

    if ($('#jour0 option:selected').val() == 0) {
      i = 1;
      $("select[id^='heure0']").fadeOut("slow");
      $("button[id^='heure0']").fadeOut("slow");

    }

  });

  $('#jour1').change(function () {

    $("select[id^='heure10']").fadeIn("slow");
    $("button[id^='heure1']").fadeIn("slow");
    if ($('#jour1 option:selected').val() == 0) {
      j = 1;
      $("select[id^='heure1']").fadeOut("slow");
      $("button[id^='heure1']").fadeOut("slow");
    }
  });

  $('#jour2').change(function () {

    $("select[id^='heure20']").fadeIn("slow");
    $("button[id^='heure2']").fadeIn("slow");
    if ($('#jour2 option:selected').val() == 0) {
      k = 1;
      $("select[id^='heure2']").fadeOut("slow");
      $("button[id^='heure2']").fadeOut("slow");
    }
  });

  $('#jour3').change(function () {

    $("select[id^='heure30']").fadeIn("slow");
    $("button[id^='heure3']").fadeIn("slow");
    if ($('#jour3 option:selected').val() == 0) {
      l = 1;
      $("select[id^='heure3']").fadeOut("slow");
      $("button[id^='heure3']").fadeOut("slow");
    }
  });

  $('#jour4').change(function () {

    $("select[id^='heure40']").fadeIn("slow");
    $("button[id^='heure4']").fadeIn("slow");
    if ($('#jour4 option:selected').val() == 0) {
      m = 1
      $("select[id^='heure4']").fadeOut("slow");
      $("button[id^='heure4']").fadeOut("slow");
    }
  });

  //Permet d'ajouter des plages horaires


  $("button[id^='heure0+']").click(function () {

    if (i < 9) {

      var id = "id=heure0" + i;
      $("select[" + id + "]").fadeIn("slow");
      i++;
    }
    else {
      alert("Vous ne pouvez pas ajouter plus de plages horaires au " + $('#jour0 option:selected').text().toLowerCase() + ".")
      i = 0;
    }
  });




  $("button[id^='heure1+']").click(function () {

    if (j < 9) {

      var id = "id=heure1" + j;
      $("select[" + id + "]").fadeIn("slow");
      j++;
    }
    else {
      alert("Vous ne pouvez pas ajouter plus de plages horaires au " + $('#jour1 option:selected').text().toLowerCase() + ".")
    }
  });



  $("button[id^='heure2+']").click(function () {

    if (k < 9) {

      var id = "id=heure2" + k;
      $("select[" + id + "]").fadeIn("slow");
      k++;
    }
    else {
      alert("Vous ne pouvez pas ajouter plus de plages horaires au " + $('#jour2 option:selected').text().toLowerCase() + ".")
    }
  });



  $("button[id^='heure3+']").click(function () {

    if (l < 9) {

      var id = "id=heure3" + l;
      $("select[" + id + "]").fadeIn("slow");
      l++;
    }
    else {
      alert("Vous ne pouvez pas ajouter plus de plages horaires au " + $('#jour3 option:selected').text().toLowerCase() + ".")
    }
  });



  $("button[id^='heure4+']").click(function () {

    if (m < 9) {

      var id = "id=heure4" + m;
      $("select[" + id + "]").fadeIn("slow");
      m++;
    }
    else {
      alert("Vous ne pouvez pas ajouter plus de plages horaires au " + $('#jour4 option:selected').text().toLowerCase() + ".")
    }
  });

  // Fonction qui permet d'éviter les doublons, si lundi est selectionné, il ne sera plus dispo sur les autres listes déroulantes pareil pour les horaires


  $("button[id^='heure0-']").click(function () {

    if (i == 1) {
      $("button[id^='heure0']").fadeOut("slow");
      i--;
      var id = "id=heure0" + i;

      var value = $("#jour0").children("option:selected").val();
      var valueHeure = $("select[" + id + "]").children("option:selected").val();
      $("select[id^='jour'] option[value=" + value + "]").show();
      $("select[id^='heure0'] option[value=" + valueHeure + "]").show();
      $("select[" + id + "]").val("0");
      $("select[" + id + "]").fadeOut("slow");
      $("#jour0").val("0");
      i++;

    }
    else {
      i--

      var id = "id=heure0" + i;
      var value = $("select[" + id + "]").children("option:selected").val();
      $("select[" + id + "]").val("0");
      $("select[id^='heure0'] option[value=" + value + "]").show();
      $("select[" + id + "]").fadeOut("slow");

    }

  });

 
  $("button[id^='heure1-']").click(function () {

    if (j == 1) {
      $("button[id^='heure1']").fadeOut("slow");
      j--;
      var id = "id=heure1" + j;

      var value = $("#jour1").children("option:selected").val();
      var valueHeure = $("select[" + id + "]").children("option:selected").val();
      $("select[id^='jour'] option[value=" + value + "]").show();
      $("select[id^='heure1'] option[value=" + valueHeure + "]").show();
      $("select[" + id + "]").val("0");
      $("select[" + id + "]").fadeOut("slow");
      $("#jour1").val("0");
      j++;

    }
    else {
      j--

      var id = "id=heure1" + j;
      var value = $("select[" + id + "]").children("option:selected").val();
      $("select[" + id + "]").val("0");
      $("select[id^='heure1'] option[value=" + value + "]").show();
      $("select[" + id + "]").fadeOut("slow");

    }

  });


  $("button[id^='heure2-']").click(function () {

    if (k == 1) {
      $("button[id^='heure2']").fadeOut("slow");
      k--;
      var id = "id=heure2" + k;

      var value = $("#jour2").children("option:selected").val();
      var valueHeure = $("select[" + id + "]").children("option:selected").val();
      $("select[id^='jour'] option[value=" + value + "]").show();
      $("select[id^='heure2'] option[value=" + valueHeure + "]").show();
      $("select[" + id + "]").val("0");
      $("select[" + id + "]").fadeOut("slow");
      $("#jour2").val("0");
      k++;

    }
    else {
      k--

      var id = "id=heure2" + k;
      var value = $("select[" + id + "]").children("option:selected").val();
      $("select[" + id + "]").val("0");
      $("select[id^='heure2'] option[value=" + value + "]").show();
      $("select[" + id + "]").fadeOut("slow");

    }

  });


  $("button[id^='heure3-']").click(function () {

    if (l == 1) {
      $("button[id^='heure3']").fadeOut("slow");
      l--;
      var id = "id=heure3" + l;

      var value = $("#jour3").children("option:selected").val();
      var valueHeure = $("select[" + id + "]").children("option:selected").val();
      $("select[id^='jour'] option[value=" + value + "]").show();
      $("select[id^='heure3'] option[value=" + valueHeure + "]").show();
      $("select[" + id + "]").val("0");
      $("select[" + id + "]").fadeOut("slow");
      $("#jour3").val("0");
      l++;

    }
    else {
      l--

      var id = "id=heure3" + l;
      var value = $("select[" + id + "]").children("option:selected").val();
      $("select[" + id + "]").val("0");
      $("select[id^='heure3'] option[value=" + value + "]").show();
      $("select[" + id + "]").fadeOut("slow");

    }

  });


  $("button[id^='heure4-']").click(function () {

    if (m == 1) {
      $("button[id^='heure4']").fadeOut("slow");
      m--;
      var id = "id=heure4" + m;

      var value = $("#jour4").children("option:selected").val();
      var valueHeure = $("select[" + id + "]").children("option:selected").val();
      $("select[id^='jour'] option[value=" + value + "]").show();
      $("select[id^='heure4'] option[value=" + valueHeure + "]").show();
      $("select[" + id + "]").val("0");
      $("select[" + id + "]").fadeOut("slow");
      $("#jour4").val("0");
      m++;

    }
    else {
      m--

      var id = "id=heure4" + m;
      var value = $("select[" + id + "]").children("option:selected").val();
      $("select[" + id + "]").val("0");
      $("select[id^='heure4'] option[value=" + value + "]").show();
      $("select[" + id + "]").fadeOut("slow");

    }

  });
});

// Controle formulaire jQuery Validate() pour le formulaire d'inscription des horaires
$(function () {
  $.validator.addMethod("noSpace", function (value, element) {
    return value == '' || value.trim().length != 0
  }, "Les espaces ne sont pas acceptés");
  jQuery.validator.addMethod("lettersonly", function (value, element) {
    return this.optional(element) || /^[A-Za-z]+$/i.test(value);
  }, "Letters only please");
},
  $("#myform").validate({
    rules: {
      // rules permet de mettre des règles, ici nom/prenom/courriel/code etudiant sont obligatoires
      nom: {
        required: true,
        noSpace: true,
        lettersonly: true,
        minlength: 2
      },
      prenom: {
        required: true,
        noSpace: true,
        lettersonly: true,
        minlength: 2
      },
      courriel: {
        required: true,
        email: true,
        noSpace: true,
      },
      code: {
        required: true,
        noSpace: true,
        minlength: 5
      },
    },
    messages: {
      nom: {
        required: 'Le nom est requis',
        noSpace: 'Le nom ne peut pas d' / 'espace',
        minlength: 'Votre nom doit comporter plus de 2 caractères',
        lettersonly: 'Votre nom ne peut pas avoir de chiffre'
      },
      prenom: {
        required: 'Le prénom est requis',
        noSpace: 'Le prénom ne peut pas comporter d' / 'espace',
        minlength: 'Votre prénom doit comporter plus de 2 caractères',
        lettersonly: 'Votre prénom ne peut pas avoir de chiffre'
      },
      courriel: {
        required: 'Le courriel est requis',
        email: 'Un email valide est exigé',
        noSpace: 'Pas d' / 'espace dans le courriel'
      },
      code: {
        required: 'Le code étudiant est requis',
        noSpace: 'Le code ne peut pas contenir d' / 'espace',
        minlength: 'Votre code étudiant doit comporter plus de 5 caractères'
      },
    }
  }));
  // jQuery Validate, permet de contrôler le formulaire de connexion avant envoie
  $('#formLogin').validate({
    rules: {
      // rules permet de mettre des règles, ici login/password sont obligatoire et ont une longueur minimum de 2
      login: {
        required: true,
        noSpace: true,
        minlength: 2
      },
      password: {
        required: true,
        noSpace: true,
        minlength: 2
  },
},
// messages permet d'afficher le message à afficher en cas d'erreur sur l'une des règles 
  messages: {
    login: {
      required: 'Le login est requis',
      noSpace: 'Le login ne peut pas d' / 'espace',
      minlength: 'Votre login doit comporter plus de 2 caractères',
    },
    password: {
      required: 'Le mot de passe est requis',
      noSpace: 'Le mot de passe ne peut pas comporter d' / 'espace',
      minlength: 'Votre mot de passe doit comporter plus de 2 caractères',
    }
  }
  });



// // Connexion Ajax
// function checkLogin() {

//   $('#form-errors').html('');
//   let login = $('#login').val();
//   let password = $('#password').val();


//   if (login == '' ||
//     password == '') {

//     //message d'erreur
//     $('#form-errors').html('Veuillez remplir tout les champs.');

//   }
//   else {

//     u = 0;
//     (login.length < 2 || password.length) < 2 ? ($('#form-errors').html("Votre login & mot de passe ne peuvent faire moins de 2 caractères."), u = 1) : '';

// //     if (u == 0) {
// //       let data = {
// //         login: login,
// //         password: password,
// //       };
// //       $.ajax({
// //         url: './rqtconnexion.php',
// //         method: 'POST',
// //         data: data,
// //         dataType: "json",
// //         success: function (data) {
// //           if (data.statut === 0) {
// //             $("#form-errors").html("Mot de passe ou login incorrect");
// //           }
// //         }
// //       });
//     };
//   }

// Partie AJAX 

// function checkform(){

//   $('#form-errors').html('');
//   let nom = $('#nom').val();
//   let prenom = $('#prenom').val();
//   let courriel   = $('#courriel').val();
//   let code  = $('#code').val();


//   if (nom == '' ||
//       prenom == '' ||
//       courriel == '' ||
//       code == '') {

//       //message d'erreur
//       $('#form-errors').html('Veuillez remplir tout les champs.');

//   }
// else {

//       u = 0;
//       (prenom.length < 2 || nom.length < 2 || !isNaN(prenom) || !isNaN(nom)) ? ($('#form-errors').html("Votre nom & prénom ne peuvent faire moins de 2 caractères ou contenir de chiffres."), u = 1) : '' ;
//       (null == courriel.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) ? ($('#form-errors').html("Merci de vérifier votre email"), u = 1) : '' ;

//       if(u == 0)
//       {
//           let data = {
//                   prenom: prenom,
//                   nom: nom,
//                   courriel: courriel,
//                   code: code,
//                   dispo: dispo,
//           };
//           // console.log(firstname);
//           // console.log(email);
//           // console.log(lastname);
//           // console.log(code);
//           $.ajax({
//               url: './rqtinsertion.php',
//               method: 'POST',
//               data: data,
//               dataType: 'json',
//               // success:function(){
//               //   let message = "Vos informations ont bien été envoyées"; 
//               //   let html =  "<div class=\"container-info text-center mt-4\">";
//               //   html     += "<h2 style=\"margin-bottom: 5px; margin-top: 5px; font-size: 25px;\">Merci !</h2>";
//               //   html     += "<i class=\"fa fa-check\" style=\"font-size: 35px; color:#3ADB15; margin:0 auto;\"></i>";
//               //   html     += "<p>"+message+"</p>";
//               //   html     += "</div>";
//               //   html     += "</div>";
//               //   html     += "<div class=\"control\">";
//               //   html     += "</div>";
//               //   $('#CrForm').html(html);
//               // },

// }).done(function(retour)
//               {
//                 console.log(retour.statut);
//                   if (retour.statut == true){
//                       let message = "Vos informations ont bien été envoyées";
//                       let html =  "<div class=\"container-info text-center mt-4\">";
//                       html     += "<h2 style=\"margin-bottom: 5px; margin-top: 5px; font-size: 25px;\">Merci !</h2>";
//                       html     += "<i class=\"fa fa-check\" style=\"font-size: 35px; color:#3ADB15; margin:0 auto;\"></i>";
//                       html     += "<p>"+message+"</p>";
//                       html     += "</div>";
//                       html     += "</div>";
//                       html     += "<div class=\"control\">";
//                       html     += "</div>";
//                       $('#CrForm').html(html);

//                   }else{
//                       let message = "Votre email ou code est déjà utilisé";
//                       let html =  "<div class=\"container-info text-center mt-4\">";
//                       html     += "<h2 style=\"margin-bottom: 5px; margin-top: 5px; font-size: 25px;\">Merci !</h2>";
//                       html     += "<i class=\"fa fa-check\" style=\"font-size: 30px; color:#3ADB15; margin:0 auto;\"></i>";
//                       html     += "<p>"+message+"</p>";
//                       html     += "</div>";
//                       html     += "</div>";
//                       html     += "<div class=\"control\">";
//                       html     += "</div>";
//                       $('#CrForm').html(html);
//                   }
//               });
//       }
//   }
// }

