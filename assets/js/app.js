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
          
          $(myGramHtml).insertBefore("#more");
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