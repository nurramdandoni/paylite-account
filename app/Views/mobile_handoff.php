<!-- <script>
if (navigator.userAgent.includes("PayliteApp")) {
    window.location = "paylite://login?tokenApps=<?= $_COOKIE['tokenApps']; ?>";
} else {
    window.location = "/loginC";
}
</script> -->

<script>
if (navigator.userAgent.includes("Mobile")) {

    const token = "<?= urlencode($_COOKIE['tokenApps']); ?>";
    const url = "paylite://callback?tokenApps=" + token;

    // coba buka app
    window.location.href = url;

    // kalau app tidak ada -> fallback cepat
    setTimeout(function () {
        window.location.href = "/loginC";
    }, 5000);

} else {
    window.location.href = "/loginC";
}
</script>
