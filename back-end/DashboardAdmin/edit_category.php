<?php
require_once __DIR__ . '/../../../db.php';
$perpus = new database();

$id = $_GET['id'];
$category = $perpus->getCategoryById($id);

if (!$category) {
    header("Location: categories_data.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <!-- Gunakan styling yang sama dengan add_category.php -->
    <title>Edit Category</title>
</head>

<body>
    <div class="container">
        <div class="logo">ARCADIA BOOKS</div>
        <h1>Edit Category</h1>
        <form action="../../proses.php?aksi=edit_kategori" method="post">
            <input type="hidden" name="id" value="<?= $category['category_id'] ?>">

            <label for="nama">Category Name :</label>
            <input type="text" id="nama" name="nama"
                value="<?= htmlspecialchars($category['category_name']) ?>" required>

            <button type="submit" class="btn-submit">Update Category</button>
        </form>
    </div>
</body>

</html>