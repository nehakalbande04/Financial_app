<body>

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <br>
            <br>
            <br>
            <div class="card" style="padding-top: 10px; padding-left: 05px; padding-right: 05px;">
                <table id="datatable" class="table table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>title</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $key => $post) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $post->post_title ?></td>
                                <td><?= $post->post_content ?></td>
                                <td>
                                    <div title="View" class="btn-group" role="group" aria-label="First group">
                                        <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Client_Post_View?id=<?= $post->post_slug ?>';" class="btn btn-outline-secondary">
                                            <i class='tf-icons bx bx-street-view"'></i>
                                        </button>
                                        <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Client_SendMsg?id=<?= $post->post_slug ?>';" class="btn btn-outline-secondary">
                                            <i title="send this post" class='tf-icons bx bx-send'></i>
                                        </button>
                                    </div>
                                </td>
                                <!-- <td>
                                    <button title="chat" type="button" class="btn rounded-pill btn-secondary">
                                        <span class="tf-icons bx bxs-chat"></span>&nbsp; Chat
                                    </button>
                                </td> -->
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
</body>