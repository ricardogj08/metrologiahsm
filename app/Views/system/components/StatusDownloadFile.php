<?php
$stylesStatusDownload   = 'bg-hsm-green-200 text-white';
$stylesStatusNoDownload = 'bg-hsm-purple-50 text-hsm-gray-200';

$styles = $statusText === 'Descargado' ? $stylesStatusDownload : $stylesStatusNoDownload
?>


<label class="px-3 py-2 inline-block rounded-lg <?= $styles ?>">
  <?= esc($statusText) ?>
</label>
