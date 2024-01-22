<script type="text/javascript">
    const imgPre = document.querySelector(".img-pre");

    function getImg(event) {
        const src = URL.createObjectURL(event.target.files[0]);
        imgPre.src = src;
    }
</script>
