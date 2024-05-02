<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<?php if (!empty($error)) : ?>
<?php foreach ($error as $error) : ?>
<li> <?= $error ?></li>
<?php endforeach; ?>
<?php endif; ?>


<section class="pb-4">
    <div class="border rounded-5">

        <section class="w-100 p-4 d-flex justify-content-center pb-4">
            <form style="width: 22rem;" action="" method="post">
                <!--Title -->
                <div class="form-outline mb-4">
                    <input type="text" id="form5Example1" class="form-control" name="title" placeholder="Article title"
                        value="<?= htmlspecialchars($title); ?>">
                    <label class="form-label" for="form5Example1" style="margin-left: 0px;">Title</label>
                    <div class="form-notch">
                        <div class="form-notch-leading" style="width: 9px;"></div>
                        <div class="form-notch-middle" style="width: 42.4px;"></div>
                        <div class="form-notch-trailing"></div>
                    </div>
                </div>

                <!-- content-->
                <div class="form-outline mb-4">
                    <textarea name="content" id="form5Example2" cols="30" rows="10" class="form-control"
                        placeholder="Article content"><?= htmlspecialchars($content); ?></textarea>
                    <label class="form-label" for="form5Example2" style="margin-left: 0px;">Content</label>
                    <div class="form-notch">
                        <div class="form-notch-leading" style="width: 9px;"></div>
                        <div class="form-notch-middle" style="width: 88.8px;"></div>
                        <div class="form-notch-trailing"></div>
                    </div>
                </div>

                <!-- Published Dat-->
                <div class="form-outline mb-4">
                    <input type="datetime-local" name="published_at" id="published_at" value="<?= $published_at; ?>">
                    <label class="form-label" for="form5Example1" style="margin-left: 0px;">Published Date and
                        Time</label>
                    <div class="form-notch">
                        <div class="form-notch-leading" style="width: 9px;"></div>
                        <div class="form-notch-middle" style="width: 42.4px;"></div>
                        <div class="form-notch-trailing"></div>
                    </div>
                </div>

                <!-- Submit button -->
                <button class="btn btn-primary btn-block mb-4">Save</button>
            </form>
        </section>
    </div>
</section>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>