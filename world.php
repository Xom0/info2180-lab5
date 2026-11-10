<?php

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO(
    "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
    $username,
    $password
);

$country = isset($_GET['country']) ? $_GET['country'] : '';

$country = trim($country);

$stmt = $conn->prepare(
    "SELECT * FROM countries WHERE name LIKE :country"
);

$stmt->execute([
    ':country' => '%' . $country . '%'
]);

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<table>
    <thead>
        <tr>
            <th>Country Name</th>
            <th>Continent</th>
            <th>Independence Year</th>
            <th>Head of State</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($results as $row): ?>
            <tr>
                <td>
                    <?= htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?>
                </td>

                <td>
                    <?= htmlspecialchars($row['continent'], ENT_QUOTES, 'UTF-8'); ?>
                </td>

                <td>
                    <?= htmlspecialchars($row['independence_year'], ENT_QUOTES, 'UTF-8'); ?>
                </td>

                <td>
                    <?= htmlspecialchars($row['head_of_state'], ENT_QUOTES, 'UTF-8'); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>