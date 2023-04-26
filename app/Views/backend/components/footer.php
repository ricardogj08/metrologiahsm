<?php

use CodeIgniter\I18n\Time;

$year = Time::now()->getYear();
?>

<!-- Pie de página -->
<footer class="footer footer-center p-4 bg-base-300 text-base-content">
  <div>
    <p>
        Copyright &copy <?= esc($year === '2023' ? '2023' : "2023-{$year}") ?>
        - Todos los derechos reservados por
        <a
          href="https://genotipo.com/"
          target="_blank"
          rel="nofollow noreferrer noopener"
          class="hover:font-medium"
        >
            Genotipo&reg;
        </a>
    </p>
  </div>
</footer>
<!-- Fin del pie de página -->
