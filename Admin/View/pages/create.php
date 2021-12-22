<?php $this->theme->header(); ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col page-title">
                    <h3>Create page</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <form id="formPage">
                        <div class="form-group">
                            <label for="formTitle">Title</label>
                            <input type="text" name="title" class="form-control" id="formTitle" placeholder="Title page...">
                        </div>
                        <div class="form-group">
                            <label for="formContent">Content</label><br>


                            <!-- Include Editor style. -->
                            <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />

                            <!-- Create a tag that we will use as the editable area. -->
                            <!-- You can use a div tag as well. -->
                            <textarea name="content" id="formContent"></textarea>

                            <!-- Include Editor JS files. -->
                            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script>

                            <!-- Initialize the editor. -->
                            <script>
                                new FroalaEditor('textarea');
                            </script>


<!--                            <input type="text" name="content" class="form-control" id="formContent" placeholder="...">-->

                        </div>
                    </form>
                </div>
                <div class="col-3">
                    <div>
                        <p>Publish this page</p>
                        <button type="submit" class="btn btn-primary" onclick="page.add()">
                            Publish
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php $this->theme->footer(); ?>