<script src="/assets/plugins/file-upload/file-upload-with-preview.min.js"></script>
<script src="/assets/plugins/flatpickr/flatpickr.js"></script>
<script>
    var f2 = flatpickr(document.getElementById('dateTimeFlatpickr'), {
        enableTime: true,
        dateFormat: "Y-m-d",
    });
</script>

<script>
    var secondUpload = new FileUploadWithPreview('myImage')
</script>