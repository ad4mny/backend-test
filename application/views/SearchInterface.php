<div class="container m-5">
    <h1>Search Results</h1>
    <?php if (isset($searchs) && is_array($searchs)) { ?>
        <?php foreach ($searchs as $row) { ?>
            <div class="row my-2">
                <div class="col">
                    <div class="card bg-white shadow-sm rounded-lg">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $row['name']; ?>
                            </h5>
                            <p class="card-text">
                                <?php echo $row['email']; ?>
                            </p>
                            <small>
                                <?php echo $row['body']; ?>
                            </small>
                            <a href="<?php echo base_url(); ?>" class="card-link float-right">Back</a><br>
                            <a href="<?php echo base_url() . $row['postId']; ?>" class="card-link float-right">View post</a>
                        </div>
                    </div>
                </div>
            </div>
    <?php }
    } else {
        // redirect(base_url());
    }
    ?>
</div>