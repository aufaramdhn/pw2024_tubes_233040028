<?php

$id = $_SESSION['user_id'];

if (isset($_POST['save'])) {
    $review = $_POST['review'];

    $array_insert = [
        'user_id' => $id,
        'review_text' => $review
    ];

    insert_data('review', $array_insert);
    header("Location: index.php?page=profile_user&subpage=order");
    exit;
}

?>

<form action="" method="POST">
    <div class="wrap-form">
        <div class="form-col">
            <div class="form-group">
                <label for="review">Enter your review</label>
                <textarea name="review" id="review" required rows="6"></textarea>
            </div>
        </div>
    </div>
    <button type="submit" name="save" class="btn" style="float: right;">Save</button>
</form>