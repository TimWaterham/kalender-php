<div class="container">
      <form action="<?= URL ?>birthday/deleteSave/<?= $birthday['id'] ?>" method="post">
            <?= $birthday['person'] ?>
            <input type="hidden" name="id" value="<?= $birthday['id'] ?>">
            <input type="submit" value="Delete">
      </form>
</div>