
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">
    <title>Audiovisuaali - URL</title>
    <link rel="icon" href="./source/img/AVLOGOtab.png" type="image/png">
    <link rel="shortcut icon" href="./source/img/AVLOGOtab.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="./source/css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="./source/js/jquery-3.2.1.min.js"></script>
    <script src="./source/js/form.js"></script>
</head>
<body>
    <div class="background-image">
    </div>



    <!-- The Modal -->
    <div id="myModal" class="modal">
      <div class="modal-content">
        <div id="myModalHeader" class="modal-header">
            <img src="./source/img/checkmarker.png" height="80" width="80">
        </div>
        <div class="modal-body">
          <p id="modal_text_1">Your URL has been created succesfully!</p>
          <p id="modal_text_2">You can access the page with the following link:</p>
          <a id="modal-success-link" href=""></a>
          <p id="created-past-box"></p>
          <div class="center"><input type="submit" id="sssbutton-create" value="Cool!"></div>
        </div>
      </div>
    </div>


    <div class="centered">
        <div class=" darken">
            <h1>Create Link</h1>
            <form>
                <label>
                    <input id="create_alias" type="text" placeholder="Maywork">
                    <span>Alias</span>
                </label>
                <label>
                    <input id="create_url" type="text" placeholder="https://google.com">
                    <span>URL</span>
                </label>
                <div class="center"><input type="button" id="button-create" value="Send"></div>
            </form>
            <div id="create_result"></div>
            <div class="divider"></div>
            <h1>Goto</h1>
            <form>
                <label>
                    <input id="goto_url" type="text" placeholder="Alias">
                    <span>Alias</span>
                </label>
                <div class="center"><input type="button" id="button-goto" value="Go"></div>
            </form>
        </div>
    </div>
</body>
</html>
