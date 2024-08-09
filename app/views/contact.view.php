<h1>Contact Us</h1>

<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Contact Form</h5>
        <small class="text-muted float-end">contact us</small>
    </div>
    <div class="card-body">
        <?php

        use application\core\form\Field;
        use application\core\form\Form;

        $form = new Form("post");

        $form->field("email", Field::INPUT_EMAIL);
        $form->field("name", Field::INPUT_TEXT);
        $form->field("subject", Field::INPUT_TEXT);
        $form->field("message", is_input_field: false);
        ?>
        <div class="row justify-content-end">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </div>
        <?php $form->end() ?>
    </div>
</div>