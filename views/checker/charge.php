<?php include "views/partials/head.php"; ?>
<?php include "views/partials/navbar.php"; ?>
<?php include "views/partials/sidebar.php"; ?>
<main class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
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
                                        <button type="button" class="btn btn-success btn btn-fw" id="start">Start</button>
                                        <button type="button" class="btn btn-danger btn btn-fw" id="stop">Stop</button>
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
    document.addEventListener('DOMContentLoaded',()=>{const s=document.getElementById('start'),t=document.getElementById('stop'),c=document.getElementById('cards'),a=document.getElementById('approved'),d=document.getElementById('declined'),e=document.getElementById('error'),u=()=>{s.disabled=!c.value.trim(),t.disabled=!0},h=()=>[a,d,e].forEach(x=>{const v=x.value.trim();x.style.display=v?"block":"none";const b=x.nextElementSibling;b&&b.tagName==="BUTTON"&&(b.style.display=v?"block":"none")});c.oninput=u;const copy=i=>{const t=document.createElement("textarea");t.value=document.getElementById(i).value,document.body.appendChild(t),t.select(),document.execCommand("copy"),document.body.removeChild(t)};s.onclick=async()=>{if(c.value.trim()){let l=c.value.trim().split("\n");s.disabled=!0,t.disabled=!1;for(let i=0;i<l.length;i++){if(t.disabled)break;const x=l[i];try{const r=await fetch("/api/v1/charge",{method:"POST",headers:{"Content-Type":"application/json","api-key":"<?php echo 'your-secret-api-key'; ?>"},body:JSON.stringify({data:x})}),v=await r.json();v.status==="ok"?a.value+=(a.value?"\n":"")+x:v.status==="nok"?d.value+=(d.value?"\n":"")+x:e.value+=(e.value?"\n":"")+x}catch{e.value+=(e.value?"\n":"")+x}h(),l.splice(i,1),c.value=l.join("\n"),i--}t.disabled=!0,u()}},t.onclick=()=>{t.disabled=!0,u()},window.copy=copy,u(),h();window.onbeforeunload=()=>{if(c.value.trim()||a.value.trim())return"Changes you made may not be saved."}});
</script>
<?php include "views/partials/footer.php"; ?>
