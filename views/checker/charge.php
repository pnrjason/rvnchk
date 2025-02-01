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
            <div class="col-md-5 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-success">Approved</h4>
                        <div class="p-3 text-success border" id="approved" style="background-color: #15161b;"></div>
                        <button class="btn btn-sm btn-dark float-end mt-3" onclick="copy('approved')"><i class="mdi mdi-content-copy"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-7 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-danger">Declined</h4>
                        <div class="p-3 text-danger border" id="declined" style="background-color: #15161b;"></div>
                        <button class="btn btn-sm btn-dark float-end mt-3" onclick="copy('declined')"><i class="mdi mdi-content-copy"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded',()=>{const s=document.getElementById('start'),t=document.getElementById('stop'),c=document.getElementById('cards'),a=document.getElementById('approved'),d=document.getElementById('declined'),u=()=>{s.disabled=!c.value.trim(),t.disabled=!0},h=()=>[a,d].forEach(x=>{const v=x.innerHTML.trim();x.style.display=v?"block":"none";const b=x.nextElementSibling;b&&b.tagName==="BUTTON"&&(b.style.display=v?"block":"none")});c.oninput=u;const copy=i=>{const element=document.getElementById(i);const t=document.createElement("textarea");t.value=element.tagName==="DIV"?element.innerText:element.value,document.body.appendChild(t),t.select(),document.execCommand("copy"),document.body.removeChild(t)};s.onclick=async()=>{if(c.value.trim()){let l=c.value.trim().split("\n");s.disabled=!0,t.disabled=!1;for(let i=0;i<l.length;i++){if(t.disabled)break;try{const r=await fetch("/api/v1/charge",{method:"POST",headers:{"Content-Type":"application/json","api-key":"<?php echo 'your-secret-api-key'; ?>"},body:JSON.stringify({data:l[i]})}),v=await r.json();if(v.status==="ok"){a.innerText+=(a.innerText?"\n":"")+`${v.card} - ${v.message}`}else if(v.status==="nok"){d.innerHTML+=`<div style="color: rgb(252, 90, 90)">${v.card} - ${v.message}</div>`}else if(v.status==="error"){d.innerHTML+=`<div style="color: rgb(255, 193, 7)">${v.card} - ${v.message}</div>`}}catch{d.innerHTML+=`<div style="color: rgb(255, 90, 90)">Error occurred</div>`}h(),l.splice(i,1),c.value=l.join("\n"),i--}t.disabled=!0,u()}},t.onclick=()=>{t.disabled=!0,u()},window.copy=copy,u(),h();window.onbeforeunload=()=>{if(c.value.trim()||a.innerText.trim())return"Changes you made may not be saved."}});
</script>
<?php include "views/partials/footer.php"; ?>
