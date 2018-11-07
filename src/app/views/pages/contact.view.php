<div>
    <div class="row mt-4">
        <div class="text-dark col-4 offset-4">
            <?php
            if (isset($_GET['submitted'])) {
                if ($_GET['submitted'] === "true") {
                    echo '<div class="submit-result submit-success">Uw bericht is met succes verzonden.</div>';
                } else {
                    echo '<div class="submit-result submit-error">Er is een fout opgetreden. Uw bericht is niet verzonden.</div>';
                }
            }
            if (!empty($_GET['errors'])) {

                ?>
                <ul class="submit-errors"><?php

                $errors = json_decode($_GET['errors'], true);

                foreach ($errors as $error) {
                    echo "<li class=\"error-message\">" . htmlspecialchars($error, ENT_QUOTES, 'utf-8') . "</li>";
                }

                ?></ul><?php
            }
            ?>

            <form name="contact" method="post" action="contactSubmit">
                <fieldset>
                    <input type="text" name="name" placeholder="Naam" required
                           value="<?= !empty($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">

                    <input type="email" name="e-mail" placeholder="E-mail" required
                           value="<?= !empty($_POST['e-mail']) ? htmlspecialchars($_POST['e-mail']) : ''; ?>">


                    <input type="tel" name="phone" placeholder="Telefoonnummer (optioneel) "
                           value="<?= !empty($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
                </fieldset>
                <fieldset>
                    <input type="text" name="subject" placeholder="Onderwerp" required
                           value="<?= !empty($_POST['subject']) ? htmlspecialchars($_POST['subject']) : ''; ?>">
                </fieldset>
                <fieldset>
                    <textarea name="message" placeholder="Bericht" id="message"
                              required><?= !empty($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                    <input type="submit" value="Verzenden">
                </fieldset>
            </form>
        </div>
    </div>
</div>