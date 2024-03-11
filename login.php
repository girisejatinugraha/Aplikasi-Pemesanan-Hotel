<?php
$title = 'Masuk';
require_once "template/theHeader.php";
midGuest();

if (isset($_POST['login'])) {
    $sql = sprintf("SELECT nama, username, password FROM users WHERE username = '%s'", $_POST['username']);

    $query = $conn->prepare($sql);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_OBJ);

    if ($user) {
        if (password_verify($_POST['password'], $user->password)) {
            $_SESSION['auth_name'] = $user->nama;
            $_SESSION['auth_user'] = $user->username;
            return header('Location:index.php');
        } else {
            $message = 'Maaf!, kata sandi Anda salah.';
        }
    } else {
        $message = 'Nama pengguna belum didaftarkan.';
    }

    hasMessage($message);
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
        <div class="box">
            <h1 class="title is-4 has-text-centered">Masuk</h1>
            <form action="" method="post">
                <div class="field">
                    <label for="username" class="label">Nama Pengguna</label>
                    <div class="control">
                        <input type="text" name="username" id="username" class="input" placeholder="Nama Pengguna" value="<?= old('username') ?>" required>
                    </div>
                </div>
                <div class="field">
                    <label for="password" class="label">Kata Sandi</label>
                    <div class="control">
                        <input type="password" name="password" id="password" class="input" placeholder="Kata Sandi" required>
                    </div>
                </div>
                <div class="field">
                    <button name="login" class="button is-success is-fullwidth">Masuk</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require_once "template/theFooter.php"
?>
