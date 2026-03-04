<script>
if (navigator.userAgent.includes("PayliteApp")) {
    window.location = "paylite://login?tokenApps=<?= $_COOKIE['tokenApps']; ?>";
} else {
    window.location = "/loginC";
}
</script>
