<?php

delete_data('menu', ['menu_id' => $_GET['menu_id']]);
header('Location: index.php?page=menu');
exit;
