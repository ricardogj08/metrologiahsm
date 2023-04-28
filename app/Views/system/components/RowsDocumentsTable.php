<?php foreach ($rowsInformation as $row): ?>
  <tr class="shadow-lg [&>td]:p-4 bg-white text-hsm-gray-200">

    <?php foreach ($row as $index => $field): ?>
      <td class="py-3 text-hsm-gray-1 px-2 border-hsm-purple-3 border-x-0 border-[1px] <?= $index === 'ID Instrumento' ? 'text-black font-bold' : '' ?>">
          <?= esc($field) ?>
      </td>
    <?php endforeach ?>
  </tr>
  <tr class="bg-red-200">
    <td>
      <?= $this
          ->setData([
              'statusText' => 'Descargado',
          ])
          ->include('system/components/StatusDownloadFile') ?>
    </td>
    <td>
    Cliente: Laboratorio ABC
    </td>
  </tr>

<?php endforeach ?>

