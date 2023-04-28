<tr class="text-left [&>th]:p-4">
      <!-- [&>th]:hidden lg:[&>th]:table-cell -->
      <?php foreach ($columns as $column): ?>
        <th class="text-sm">
            <?= esc($column) ?>
        </th>
      <?php endforeach ?>
</tr>
