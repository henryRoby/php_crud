<?php
require 'db.php';
$sql = 'SELECT * FROM eleves';
$statement = $connection->prepare($sql);
$statement->execute();
$eleves = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>liste des eleves</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>Id</th>
          <th>Non</th>
          <th>Prenom</th>
          <th>Actions</th>
        </tr>
        <?php foreach($eleves as $person): ?>
          <tr>
            <td><?= $person->id; ?></td>
            <td><?= $person->name; ?></td>
            <td><?= $person->email; ?></td>
            <td>
              <a href="edit.php?id=<?= $person->id ?>"  class="btn btn-success">Modifier</a>
              <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette entrée?')" href="delete.php?id=<?= $person->id ?>" class='btn btn-danger'>Supprimer</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
