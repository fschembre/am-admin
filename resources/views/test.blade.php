@include('includes.head')

<div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>

<button>Get External Content</button>
<script>
    $(document).ready(function(){
        $("button").click(function(){
            $("#div1").load("demo_test.txt");
        });
    });
</script>
</body>
</html>