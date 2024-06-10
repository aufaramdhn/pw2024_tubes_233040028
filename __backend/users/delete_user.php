<?php

delete_data('user', ['user_id' => $_GET['user_id']]);
header('Location: index.php?page=user');
exit;
