@if ($errors->any())
<script type="text/javascript">
  toastr.error('Please check the form below for errors', 'Validation Error', { "progressBar": true })
</script>
@endif

@if ($message = Session::get('success'))
<script type="text/javascript">
  toastr.success('<?php echo $message; ?>', 'Success', { "progressBar": true })
</script>
<?php Session::forget('success');?>
@endif

@if ($message = Session::get('error'))
<script type="text/javascript">
  toastr.error('<?php echo $message; ?>', 'Error', { "progressBar": true })
</script>
<?php Session::forget('error');?>
@endif

@if ($message = Session::get('warning'))
<script type="text/javascript">
  toastr.warning('<?php echo $message; ?>', 'Warning', { "progressBar": true })
</script>
<?php Session::forget('warning');?>
@endif

@if ($message = Session::get('info'))
<script type="text/javascript">
  toastr.info('<?php echo $message; ?>', 'Info', { "progressBar": true })
</script>
<?php Session::forget('info');?>
@endif