
    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.3.1.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.bundle.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap-select.min.js"); ?>"></script>
    <script>
        $(document).ready(function() {
            var func = () => {
                var d = new Date();
                var x = d.toLocaleString();
                $("#clock").html(x);

            }
            func();
            setInterval(func, 1000);
            // jQuery.get('<?php echo base_url("assets/texts/cities.txt"); ?>', function(data) {
            //     var x = data.split("\r\n");
            //     x.forEach(function(line) {
            //         console.log(line)
            //         var select = document.getElementById("origem");
            //         select.options[select.options.length] = new Option(line, line);
            //         // $("#origem").append(`<option value="${line}">${line}</option>`)
            //     })
            // });

        });
    </script>
        <script>
        $(document).ready(function() {
            $("#loading").toggle("slow", function(){
                $("#loading").toggleClass("d-flex")
            })
            console.log("done");
        });
    </script>

</body>

</html> 