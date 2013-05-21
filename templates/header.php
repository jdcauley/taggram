<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Taggram</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="Jordan Cauley" content="">
  <!--
    Instagram PHP API class @ Github
    https://github.com/cosenary/Instagram-PHP-API
  -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css" media="screen">
  <link rel="stylesheet" href="assets/css/bootstrap-responsive.min.css" type="text/css" media="screen">
  <link rel="stylesheet" href="assets/css/app.css" type="text/css" media="screen">
  <!--[if gte IE 9]><style type="text/css">.gradient {filter: none;}</style><![endif]-->
  <script type="text/javascript" src="assets/js/underscore.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <script>   
    // This is a global, containing all the PHP instagrams converted to a javascript object
    var startingGrams = <?php echo json_encode($media->data) ?>;
    

    $(document).ready(function() {
      var gramTemplate = _.template($("#gram-template").html() );
      
      generateTemplates(startingGrams);
      
      $('#more').click(function() {
        var tag   = $(this).data('tag'),
            maxid = $(this).data('maxid');
  
        fetchMoreGrams({tag: tag,  maxid: maxid});

      });
      
      function generateTemplates(data){
        $.each(data, function(i, gramData) {
          var myGramHtml = gramTemplate({myData: gramData});
          
          $(myGramHtml).appendTo("#photos");
        });
      };
      function fetchMoreGrams(options){
        
        $.getJSON('ajax.php', options,
          function(data) {
            // Output data. We're using the same routine as the initial display, but we're using the dataset
            //   generated via AJAX this time
            generateTemplates(data.dt);
            
            // debug output
            console.log("MaxID: "+options.maxid+", NextID: "+data.next_id);
            // Store new maxid
            $("#more").data({maxid: data.next_id});
          }
        );
      };
    });
  </script>
</head>
<body>
 <header id="banner" class="navbar navbar-static-top " role="banner">
  <div class="navbar-inner">
    <div class="container">
      <a alt="logo-link" class="brand" href="/">Taggram</a>
    </div>
  </div>
</header>
