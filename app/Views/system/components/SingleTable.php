<!-- Table -->
<div class="overflow-x-auto">
  <div>
      <table class="border-spacing-y-2 border-collapse table w-full">
          <!-- Columns -->
          <thead class="py-3 table-row-group">
              <!-- Columns Table -->
              <?= $this
                  ->setVar('columnsDocuments', $columns)
                  ->include('system/components/ColumnsSingleTable') ?>
          </thead>

          <tbody>
                <!-- Rows Table -->
                <?= $this
                    ->setVar('rowsInformation', $rowsInformation)
                    ->include('system/components/RowsSingleTable') ?>
          </tbody>
      </table>
  </div>
</div>
