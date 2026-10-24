    <!-- 10. PIE DE PÁGINA -->
    <footer class="footer">
      <div class="container text-center">
        <p class="navbar-brand mb-2">
          <img
            src="<?= $base_ruta ?? '' ?>img/logo-extreme.png"
            alt="Extreme Gym"
            class="logo-footer"
          />
        </p>
        <p class="mb-0">
          &copy; <span id="anio">2026</span> <?= $_ENV['APP_NAME'] ?>. Todos los derechos
          reservados.
        </p>
      </div>
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script src="<?= $base_ruta ?? '' ?>js/main.js"></script>
    <script src="<?= $base_ruta ?? '' ?>js/busqueda.js"></script>
  </body>
</html>