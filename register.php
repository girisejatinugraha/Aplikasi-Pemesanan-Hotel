<?php
$title = 'Daftar';
require_once "template/theHeader.php";
midGuest();

if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_ARGON2I);

    $sql = "INSERT INTO users(nama, username, password) VALUES (:nama, :username, :password)";
    $query = $conn->prepare($sql);
    $query->bindParam(':nama', $nama);
    $query->bindParam(':username', $username);
    $query->bindParam(':password', $password);

    if ($query->execute()) {
        $_SESSION['auth_name'] = $nama;
        $_SESSION['auth_user'] = $username;
        return header('Location:index.php');
    }

    hasMessage('Maaf!, Anda tidak dapat mendaftarkan akun baru.');
}
?>
<style>
    .button.is-success {
    background-color: #4b8ef1;
    color: #fff;
}

.button.is-success:hover {
    background-color: #357ae8;
}
</style>

<div class="columns is-centered" style="height: 75vh; display: flex; align-items: center;">
    <div class="column is-4">
        <div class="card">
            <div class="card-content">
                <h1 class="title is-4 has-text-centered">Daftar</h1>
                <form action="" method="post">
                    <div class="field">
                        <label for="nama" class="label">Nama Lengkap</label>
                        <div class="control">
                            <input type="text" name="nama" id="nama" class="input" placeholder="Masukkan nama lengkap" value="<?= old('nama') ?>" required>
                        </div>
                    </div>
                    <div class="field">
                        <label for="username" class="label">Nama Pengguna</label>
                        <div class="control">
                            <input type="text" name="username" id="username" class="input" placeholder="Masukkan nama pengguna" value="<?= old('username') ?>" required>
                        </div>
                    </div>
                    <div class="field">
                        <label for="password" class="label">Kata Sandi</label>
                        <div class="control">
                            <input type="password" name="password" id="password" class="input" placeholder="Masukkan kata sandi" required>
                        </div>
                    </div>
                    <div class="field">
                        <button name="register" class="button is-success is-fullwidth">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require_once "template/theFooter.php";
?>
