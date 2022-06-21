<h1>Hello, world!</h1>
<h2 id="ip-addr"></h2>
<script>
    (async function() {
        try {
            const ip = (await (await fetch('https://api.xteam.xyz/cekip')).json()).response;
            document.querySelector('#ip-addr').innerHTML = ip;
        } catch (err) {
            console.log(err);
        }
    })();
</script>