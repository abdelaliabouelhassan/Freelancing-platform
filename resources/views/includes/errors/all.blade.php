@if ($errors->any())
<?php $val = "";?>
@foreach ($errors->all() as $error)
    <?php $val = $val . $error;?>
@endforeach
<script>    
    showNotification("alert-danger", "<?php echo $error; ?>", "top",
        "center", "", "");
</script>
{{-- <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>* {{ $error }}</li>
@endforeach
</ul>
</div> --}}
@endif
