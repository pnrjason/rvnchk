<?php include "views/partials/head.php"; ?>
<?php include "views/partials/navbar.php"; ?>
<?php include "views/partials/sidebar.php"; ?>
<main class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <h4 class="card-title text-primary">Charge</h4>
                                <p>Initiates a charge on the card by deducting a small amount from the cardholder's account.</p>
                                <p>Costs<code>1 credit</code>/ Maximum of<code>300 cards</code>per check.</p>
                                <textarea id="cards" class="form-control bg-dark p-4" rows="15" placeholder="Format: XXXXXXXXXXXXXXXX|XX|XXXX|XXX

Enter one card per line."></textarea>
                                <div class="mt-3">
                                    <div class="d-flex justify-content-center gap-3">
                                        <div class="form-check form-check-flat form-check-primary">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" checked> Remove duplicates <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-flat form-check-primary">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input"> Forward live cards to ID <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check form-check-flat form-check-primary">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input"> Check without CVV <i class="input-helper"></i></label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center gap-2 mt-3">
                                        <button type="button" class="btn btn-success btn btn-fw">Start</button>
                                        <button type="button" class="btn btn-danger btn btn-fw" disabled>Stop</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-success">Approved</h4>
                        <textarea id="approved" class="form-control bg-dark p-4" style="color: rgb(61, 213, 151)" rows="5" disabled></textarea>
                        <button class="btn btn-sm btn-primary float-end mt-2" onclick="copy('approved')">Copy</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-danger">Declined</h4>
                        <textarea id="declined" class="form-control bg-dark p-4" style="color: rgb(252, 90, 90)" rows="5" disabled></textarea>
                        <button class="btn btn-sm btn-primary float-end mt-2" onclick="copy('declined')">Copy</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-warning">Error</h4>
                        <textarea id="error" class="form-control bg-dark p-4" style="color: rgb(255, 197, 66)" rows="5" disabled></textarea>
                        <button class="btn btn-sm btn-primary float-end mt-2" onclick="copy('error')">Copy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    function copy(textareaId) {
        const textarea = document.getElementById(textareaId);
        const value = textarea.value;
        const tempTextarea = document.createElement('textarea');
        tempTextarea.value = value;
        document.body.appendChild(tempTextarea);
        tempTextarea.select();
        document.execCommand('copy');
        document.body.removeChild(tempTextarea);
    }
</script>
<script>
    const textareas = document.querySelectorAll("textarea:not(#cards)");
    textareas.forEach(textarea => {
        if (!textarea.value.trim()) {
            textarea.style.display = "none";
            const button = textarea.nextElementSibling;
            if (button && button.tagName === "BUTTON") {
                button.style.display = "none";
            }
        }
    });
</script>
<?php include "views/partials/footer.php"; ?>
