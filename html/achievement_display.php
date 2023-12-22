<?php
function select($query)
{
  require "koneksi.php";

  if ($result = mysqli_query($conn, $query)) {
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }

    return $rows;
  }
  return null;
}

$data_achievement = select("SELECT * FROM user_achievement");
?>

<!DOCTYPE html>
<html>
    <body>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Championship</th>
                    <th>Date</th>
                    <th>Place</th>
                    <th>Organizer</th>
                    <th>Certificate</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $num = 1; ?>
                <?php if (!empty($data_achievement)): ?>
                    <?php foreach ($data_achievement as $achievement): ?>
                        <tr>
                            <td><?= $achievement["name"] ?></td>
                            <td><?= $achievement["date"] ?></td>
                            <td><?= $achievement["description"] ?></td>
                            <td><?= $achievement["organizer"] ?></td>

                            <td>
                                <a href="ubah_achievement.php?id=<?= $achievement[
                                  "id"
                                ] ?>">Ubah</a>
                                <a href="hapus_achevement.php?id<?= $achievement[
                                  "id"
                                ] ?>">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No achievements found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </body>
</html>