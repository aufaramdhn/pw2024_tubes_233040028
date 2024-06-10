<?php

ob_start();

session_start();

date_default_timezone_set('Asia/Jakarta');

define('BASE_URL', 'http://localhost/');

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

    mysqli_fetch_array($result);

    return $result;
}

function array_query($query)
{
    $conn = koneksi();

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $rows = mysqli_fetch_assoc($result);
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
    }

    return $rows;
}

function dynamic_join($tables, $conditions, $join_type = 'INNER', $select = '*', $where = '', $group_by = '')
{
    $conn = koneksi();

    $query = "SELECT $select FROM " . $tables[0];

    for ($i = 1; $i < count($tables); $i++) {
        $query .= " $join_type JOIN " . $tables[$i] . " ON " . $conditions[$i - 1];
    }

    if (!empty($where)) {
        $query .= " WHERE " . $where;
    }

    if (!empty($group_by)) {
        $query .= " GROUP BY " . $group_by;
    }


    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    mysqli_close($conn);

    return $rows;
}

function generateCryptoRandomString($length = 20)
{
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }

    return $randomString;
}

function live_search_menu($query)
{

    $result = mysqli_query(koneksi(), $query);

    return $result;
}


function login($data)
{
    $conn = koneksi();
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);

    $user = array_query("SELECT * FROM user WHERE username = '$username'");

    if ($user['username'] == $username) :
        if (password_verify($password, $user['password'])) :
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_img'] = $user['user_img'];
            $_SESSION['fullname'] = $user['user_name'];
            if ($user['role_id'] == 1) {
                $_SESSION['role'] = 'admin';
            } else {
                $_SESSION['role'] = 'user';
            }
            if (isset($data['remember'])) {
                setcookie('login', 'true', time() + (30 * 24 * 60 * 60), "/");
            }
            $_SESSION['message'] = 'Welcome ' . $user['user_name'];
            header("Location: ../index.php");
            exit;
        else :
            $_SESSION['message'] = 'Wrong password!';
            header("Location: login.php");
        endif;
    else :
        $_SESSION['message'] = 'Username not found!';
        header("Location: login.php");
    endif;

    return $_SESSION['message'];
}

function register($data)
{
    $conn = koneksi();

    $fullname = htmlspecialchars(strtolower($data['fullname']));
    $username = htmlspecialchars(strtolower($data['username']));
    $email = htmlspecialchars(strtolower($data['email']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $cPassword = mysqli_real_escape_string($conn, $data['cPassword']);

    $role = htmlspecialchars($data['id_role']);

    if (empty($username) or empty($password) or  empty($cPassword) or empty($email)) {
        $_SESSION['message'] = 'Input must be filled!';
        header("Location: register.php");
        exit;
        return false;
    }

    if (array_query("SELECT * FROM user WHERE username = '$username'")['username']) {
        $_SESSION['message'] = 'Username already exists!';
        header("Location: register.php");
        exit;
        return false;
    }

    if ($password !== $cPassword) {
        $_SESSION['message'] = 'Password not match!';
        header("Location: register.php");
        exit;
        return false;
    }

    if (strlen($password) < 5) {
        $_SESSION['message'] = 'Password must have greater than 5 character!';
        header("Location: register.php");
        exit;
        return false;
    }

    $password_baru = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO user
                VALUES
              (NULL, 'nophoto.jpg', '$fullname', '$username', '$email', '$password_baru', '$role'  )
            ";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    $_SESSION['message'] = 'Registration success! Please login!';
    header("Location: login.php");
    exit;
    return mysqli_affected_rows($conn);
}

function upload()
{
    $nama_file = $_FILES['image']['name'];
    $tipe_file = $_FILES['image']['type'];
    $ukuran_file = $_FILES['image']['size'];
    $tmp_file = $_FILES['image']['tmp_name'];

    $daftar_tipe_file = ['jpg', 'jpeg', 'png'];
    $ekstensi_file = explode('.', $nama_file);
    $ekstensi_file = strtolower(end($ekstensi_file));

    if (!in_array($ekstensi_file, $daftar_tipe_file)) {
        $_SESSION['message'] = "Your file is not an image!";
        return false;
    }

    if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
        $_SESSION['message'] = "Your file is not an image!";
        return false;
    }

    if ($ukuran_file > 5000000) {
        $_SESSION['message'] = "Size of your image is too big!";
        return false;
    }

    $base_dir = __DIR__;
    $upload_subdir = 'assets/upload/';

    $upload_dir = $base_dir . '/' . $upload_subdir;

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_file;
    move_uploaded_file($tmp_file, $upload_dir . $nama_file_baru);

    return $nama_file_baru;
}

function insert_data($table, $datas = array())

{
    $conn = koneksi();

    $field = [];
    $data = [];

    foreach ($datas as $key => $value) {
        $field[] = htmlspecialchars($key);

        if ($key == 'password') {
            $value = password_hash($value, PASSWORD_DEFAULT);
        }

        if ($key == 'menu_img' || $key == 'user_img') {
            if (!$_FILES) {
                $value = $value;
            } else if ($_FILES['image']['error'] == 0) {
                $value = upload();
            } else {
                $value = 'nophoto.jpg';
            }
        }

        $data[] = "'" . htmlspecialchars($value) . "'";
    }


    $sql = "INSERT INTO " . htmlspecialchars($table) . " (";
    $sql .= implode(", ", $field);
    $sql .= ") VALUES (";
    $sql .= implode(", ", $data);
    $sql .= ")";


    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['message'] = "Data has been added successfully";
        return true;
    } else {
        $_SESSION['message'] = "Data failed to add";
        return false;
    }
}

function update_data($table, $datas = array(), $conditions = array())
{
    $conn = koneksi();

    $fields = [];
    $data = [];

    foreach ($datas as $key => $value) {

        if ($key === 'password') {
            $value = password_hash($value, PASSWORD_DEFAULT);
        }

        if ($key === 'user_img' || $key === 'menu_img') {
            if ($_FILES['image']['error'] == 4) {
                $value = $value;
            } else {
                $value = upload();
            }
        }

        $fields[] = htmlspecialchars($key) . " = '" . htmlspecialchars($value) . "'";
    }

    $condition_fields = [];
    foreach ($conditions as $key => $value) {
        $condition_fields[] = htmlspecialchars($key) . " = '" . htmlspecialchars($value) . "'";
    }

    $sql = "UPDATE " . htmlspecialchars($table) . " SET ";
    $sql .= implode(", ", $fields);
    $sql .= " WHERE ";
    $sql .= implode(" AND ", $condition_fields);

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['message'] = "Data has been updated successfully";
        return true;
    } else {
        $_SESSION['message'] = "Data failed to update";
        return false;
    }
}


function delete_data($table, $conditions = array())
{
    $conn = koneksi();

    $condition_fields = [];


    foreach ($conditions as $key => $value) {

        if ($key === 'menu_img') {
            unlink('assets/upload/' . $value);
        }

        $condition_fields[] = htmlspecialchars($key) . " = '" . htmlspecialchars($value) . "'";
    }


    $sql = "DELETE FROM " . htmlspecialchars($table);
    if (!empty($condition_fields)) {
        $sql .= " WHERE " . implode(" AND ", $condition_fields);
    }


    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['message'] = "Data has been deleted successfully";
        return true;
    } else {
        $_SESSION['message'] = "Data failed to delete";
        return false;
    }
}
