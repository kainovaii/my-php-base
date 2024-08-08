<h1>Contact Us</h1>

<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Contact Form</h5>
        <small class="text-muted float-end">contact us</small>
    </div>
    <div class="card-body">
        <?php

        use application\core\form\Form;

        $form = new Form("post") ?>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
            <div class="col-sm-10">
                <div class="input-group input-group-merge">
                    <input type="text" id="basic-default-email" autofocus required class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-default-email2">
                    <span class="input-group-text" id="basic-default-email2">@example.com</span>
                </div>
                <div class="form-text">You can use letters, numbers &amp; periods</div>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-subject">subject</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="basic-default-subject" required placeholder="ACME Inc.">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-message">Message</label>
            <div class="col-sm-10">
                <textarea id="basic-default-message" required class="form-control" placeholder="Hi, Do you have a moment to talk Joe?" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2"></textarea>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </div>
        <?php $form->end() ?>
    </div>
</div>