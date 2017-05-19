<?php 
      $months = array(
            "onbekend",
            "Januari",
            "Februari",
            "Maart",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Augustus",
            "September",
            "Oktober",
            "November",
            "December"
            );
?>
<div class="container">
      <form action="<?= URL ?>birthday/editSave" method="post">
            <input type="text" name="person" value="<?= $birthday['person'] ?>">
            <select name="day">
                  <?php
                  for ($i = 1; $i <= 31; $i++) {
                        if ($birthday['day'] == $i) {
                              echo "<option value=\"" . $i . "\" selected>" . $i . "</option>\n              ";
                        } else {
                              echo "<option value=\"" . $i . "\">" . $i . "</option>\n              ";
                        }
                  }
                  ?>
            </select>
            <select name="month">
                  <?php
                        for ($i = 1; $i <= 12; $i++) {
                              if ($birthday['month'] == $i) {
                              echo "<option value=\"" . $i . "\" selected>" . $months[$i] . "</option>\n              ";
                              } else {
                              echo "<option value=\"" . $i . "\">" . $months[$i] . "</option>\n              ";
                              }
                        }
                  ?>
            </select>
            <select name="year">
                  <?php
                  for ($i = 1900; $i <= date(Y); $i++) {
                        if ($birthday['year'] == $i) {
                              echo "<option value=\"" . $i . "\" selected>" . $i . "</option>\n              ";
                        } else {
                              echo "<option value=\"" . $i . "\">" . $i . "</option>\n              ";
                        }
                  }
                  ?>
            </select>
            <input type="hidden" name="id" value="<?= $birthday['id']; ?>">
            <input type="submit" value="Verzenden">
      </form>
</div>