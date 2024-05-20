<?php

session_start();

$error = [
    'error' => '',
    'pesan' => ''
];

define('BASE_URL', 'http://localhost/');
define('BASE_PATH', __DIR__ . '\\');

function base_url($path = '')
{
    return BASE_URL . $path;
}

function koneksi()
{
    return mysqli_connect("localhost", "root", "", "pw2024_tubes_233040028");
}

function query($query)
{
    $conn = koneksi();

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    }

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function login($data)
{
    $conn = koneksi();
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);

    if ($user = query("SELECT * FROM user WHERE username = '$username'")) :
        if (password_verify($password, $user['password'])) :
            $_SESSION['login'] = true;
            $_SESSION['id'] = $user['id'];
            header("Location: ../index.php");
            exit;
        else :
            echo "<script>
    alert('password salah!');
    document.location.href = 'login.php';
        </script>";
        endif;
    else :
        echo "<script>
    alert('username tidak ada!');
    document.location.href = 'login.php';
        </script>";
    endif;
}

function register($data)
{
    $conn = koneksi();

    $username = htmlspecialchars(strtolower($data['username']));
    $email = htmlspecialchars(strtolower($data['email']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $cPassword = mysqli_real_escape_string($conn, $data['cPassword']);

    $role = ($data['id_role']);

    if (empty($username) or empty($password) or  empty($cPassword) or empty($email)) {
        echo "<script>
      alert('Tolong isi semuanya');
      document.location.href = 'register.php';
      </script>";
        return false;
    }

    if (query("SELECT * FROM user WHERE username = '$username'")) {
        echo "<script>
    alert('username atau passsword sudah ada');
    document.location.href = 'register.php';
    </script>";
        return false;
    }

    if ($password !== $cPassword) {
        echo "<script>
      alert('Password tidak sesuai');
      document.location.href = 'register.php';
      </script>";
    }

    if (strlen($password) < 5) {
        echo "<script>
              alert('password terlalu pendek!');
              document.location.href = 'register.php';
            </script>";
        return false;
    }


    $password_baru = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO user
                VALUES
              (NULL, '', '$username', '$email', '$password_baru', '$role'  )
            ";
    echo "<script>
    alert('Akun berhasil dibuat!');
    document.location.href = 'login.php';
        </script>";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}

function insert_data($table, $datas = array())

{
    $conn = koneksi();

    $field = [];
    $data = [];

    foreach ($datas as $key => $value) {
        $field[] = mysqli_real_escape_string($conn, $key);

        if ($key == 'password') {
            $value = password_hash($value, PASSWORD_DEFAULT);
        }

        $data[] = "'" . mysqli_real_escape_string($conn, $value) . "'";
    }


    $sql = "INSERT INTO " . mysqli_real_escape_string($conn, $table) . " (";
    $sql .= implode(", ", $field);
    $sql .= ") VALUES (";
    $sql .= implode(", ", $data);
    $sql .= ")";


    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?page=users");
        return $_SESSION['message'] = "Data berhasil ditambahkan";
    } else {
        header("Location: index.php?page=add_user");
        return $_SESSION['message'] = "Data gagal ditambahkan";
    }
}

function update_data($table, $datas = array(), $conditions = array())
{
    $conn = koneksi();

    $fields = [];
    $data = [];

    foreach ($datas as $key => $value) {

        if ($key === 'password') {
            $value = password_hash($value, PASSWORD_BCRYPT);
        }

        $fields[] = mysqli_real_escape_string($conn, $key) . " = '" . mysqli_real_escape_string($conn, $value) . "'";
    }

    $condition_fields = [];
    foreach ($conditions as $key => $value) {
        $condition_fields[] = mysqli_real_escape_string($conn, $key) . " = '" . mysqli_real_escape_string($conn, $value) . "'";
    }

    $sql = "UPDATE " . mysqli_real_escape_string($conn, $table) . " SET ";
    $sql .= implode(", ", $fields);
    $sql .= " WHERE ";
    $sql .= implode(" AND ", $condition_fields);

    $result = mysqli_query($conn, $sql);

    if ($result) {
        return true;
    } else {

        echo "Error: " . mysqli_error($conn);
        return false;
    }
}


function delete_data($table, $conditions = array())
{
    $conn = koneksi();

    $condition_fields = [];


    foreach ($conditions as $key => $value) {
        $condition_fields[] = mysqli_real_escape_string($conn, $key) . " = '" . mysqli_real_escape_string($conn, $value) . "'";
    }


    $sql = "DELETE FROM " . mysqli_real_escape_string($conn, $table);
    if (!empty($condition_fields)) {
        $sql .= " WHERE " . implode(" AND ", $condition_fields);
    }


    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?page=users");
        return $_SESSION['message'] = "Data berhasil dihapus";
    } else {
        header("Location: index.php?page=users");
        return $_SESSION['message'] = "Data gagal dihapus";
    }
}
