<div class="container m-5">
    <?php if (isset($posts) && is_array($posts)) { ?>
        <div class="row">
            <div class="col">
                <h1>All Posts</h1>
            </div>
            <div class="col-4">
                <form method="post" action="<?php echo base_url() . 'search'; ?>">
                    <div class="form-group">
                        <input type="text" class="form-control" name="query" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="filter">
                            <option value="id">Comment ID</option>
                            <option value="name">Comment Name</option>
                            <option value="email">Comment Email</option>
                            <option value="body">Comment Body</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <?php foreach ($posts as $row) { ?>
            <div class="row my-2">
                <div class="col">
                    <div class="card bg-white shadow-sm rounded-lg">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $row['post_title']; ?>
                            </h5>
                            <p class="card-text">
                                <?php echo $row['post_body']; ?>
                            </p>
                            <small>
                                <?php echo $row['total_number_of_comments'] . ' Comments'; ?>
                            </small>
                            <a href="<?php echo base_url() . $row['post_id']; ?>" class="card-link float-right">View post</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
    } else if (isset($post) && is_array($post)) { ?>
        <h2><?php echo $post['title']; ?></h2>
        <div class="row my-2">
            <div class="col">
                <p><?php echo $post['body']; ?>
                </p>
                <a href="<?php echo base_url(); ?>" class="card-link text-right">Back</a>
                <h5 class="mt-3">All Comments</h5>
                <?php if (isset($comment) && is_array($comment)) {
                    foreach ($comment as $cmt) {
                ?>
                        <div class="card bg-white shadow-sm rounded-lg mt-2">
                            <div class="card-body">
                                <p class="card-text">
                                    <?php echo $cmt['body']; ?>
                                </p><br>
                                <small>
                                    <?php echo $cmt['name']; ?>
                                </small>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    <?php
    } else {
        redirect(base_url());
    }
    ?>
</div>