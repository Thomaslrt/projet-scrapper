<html>
  <head>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
      $(function () {

        $('form').on('submit', function (e) {

          e.preventDefault();
          url = $("input[name=url]").val();
          $.ajax({
            type: 'post',
            url : 'envoi.php',
            data: $(this).serialize(),
            dataType: 'html',
            success: function(response)
                {
                    $("#signin-test").html(response);
                },
            error: function(response)
                {
                    $("#signin-test").html(response);
                }
          });

        });

      });
    </script>
  </head>
  <body>
    <form>
      <input type="url" name="url" placeholder="URL des données"><br>
      <input type="submit">
    </form>
    <div id="signin-test"></div>
  </body>
</html>