<?php
$nav_en_cours = 'accueil';
$titre = 'Accueil';
include('inc/header.php');
?>
 </div>

</nav>
<!-- Masthead -->
<header class="masthead text-white text-center espace" style="background-image: url('img/bandeaucaf.jpg')" aria-label="Bandeau du CAF">
  <div class=""></div>
</header>



<!-- Image Showcases -->
<section class="showcase espace">
  <div class="container-fluid p-0">
    <div class="row no-gutters">

      <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/imgcaf.jpg');" aria-label="Image du CAF"></div>
      <div class="col-lg-6 order-lg-1 my-auto showcase-text">
        <a class="btn btnConsult" href="disponibilite.php"> Pour ton inscription, donne ici tes disponibilités </a>
      </div>
    </div>

  </div>
</section>

<?php
include('inc/footer.php');
if (isset($_GET['pop'])) {




echo
'<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Disponibilités envoyées !</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
    
      <div class="modal-body">
      Nous vous recontacterons très bientot !
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>

    </div>
  </div>
</div>'
?>
<script> $("#myModal").modal('show');</script>
<?php

 
}
?>