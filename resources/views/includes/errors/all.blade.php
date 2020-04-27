@if ($errors->any())
<?php $val = "";?>
@foreach ($errors->all() as $error)
    <?php $val = $val . $error;?>
@endforeach
<script>    
    showNotification("alert-danger", "<?php echo $error; ?>", "top","center", "", "");
</script>
@endif
