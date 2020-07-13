  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 h-100 text-center my-auto">
          <p><i class="fas fa-info-circle"></i></p>
          <p><i class="fas fa-map-marker-alt"></i> 140 4 Avenue Painchaud, La Pocatière, Quebec G0R 1Z0</p>
          <p><i class="fas fa-phone"></i> 418 856-1525 poste #2360</p>
          <p><i class="fas fa-envelope"></i> nbelanger@cegeplapocatiere.qc.ca</p>
          

          <p class="text-muted small mb-4 mb-lg-0">&copy; Département Lettre et Communication - CAF</p>
          <br>
          <?php if (!isset($_SESSION['etatConnexion'])) {?>
          <a class="btn btnRetour" href="seConnecter.php"> Je suis administrateur</a>
          <?php }?>

        </div>
 
    </div>
    </div>
 

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="node_modules/jquery-validation/dist/jquery.validate.js"></script>
  <script src="js/main.js"></script>

 </footer>
</body>

</html>