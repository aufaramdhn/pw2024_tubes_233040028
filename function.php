<?php

session_start();

$error = [
    'error' => '',
    'pesan' => ''
];


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
        // $error['error'] = true;
        // $error['pesan'] = 'Password Salah!';
        endif;
    else :
        echo "<script>
    alert('username tidak ada!');
    document.location.href = 'login.php';
        </script>";
    // $error['error'] = true;
    // $error['pesan'] = 'Username Tidak Ditemukan!';
    endif;
}

function register($data)
{
    $conn = koneksi();

    $username = htmlspecialchars(strtolower($data['username']));
    $email = htmlspecialchars(strtolower($data['email']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $cPassword = mysqli_real_escape_string($conn, $data['cPassword']);
    // $gambar = ($data['gambar']);
    $role = ($data['id_role']);
    // jika password atau apapun kosong
    if (empty($username) or empty($password) or  empty($cPassword) or empty($email)) {
        echo "<script>
      alert('Tolong isi semuanya');
      document.location.href = 'register.php';
      </script>";
        return false;
    }
    // jika username sudah ada
    if (query("SELECT * FROM user WHERE username = '$username'")) {
        echo "<script>
    alert('username atau passsword sudah ada');
    document.location.href = 'register.php';
    </script>";
        return false;
    }
    // konfirmasi password tidak sesuai
    if ($password !== $cPassword) {
        echo "<script>
      alert('Password tidak sesuai');
      document.location.href = 'register.php';
      </script>";
    }
    // jika password < 5 digit strlen untuk menghitung panjang string
    if (strlen($password) < 5) {
        echo "<script>
              alert('password terlalu pendek!');
              document.location.href = 'register.php';
            </script>";
        return false;
    }
    // jika username & password sudah sesuai
    // enkripsi password
    $password_baru = password_hash($password, PASSWORD_DEFAULT);
    // insert ke tabel user
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
