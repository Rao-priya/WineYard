
  function updateprods(opts){
    $.ajax({
    type: "POST",
    url: "pairing_beef.php",
    dataType : 'html',
    cache: false,
    data: {filterOpts: opts},
    success: function(data){
         $("html").html(data);
    }
    });
    }

  var $checkboxes = $("input:checkbox");
  $checkboxes.on("change", function(){
  var opts = getprodFilterOptions();

  updateprods(opts);
  });

  var $radioButton = $("input:radio");          // check radio button is clicked
  $radioButton.on("change", function(){
  var opts = getprodFilterOptions();    // update the database

  updateprods(opts);
  });

  function getprodFilterOptions(){
  var opts = [];
  //var checkboxValues = {};
  $checkboxes.each(function(){
  if(this.checked){
  opts.push(this.name);

  }
  });

  $radioButton.each(function(){
  if(this.checked){
  opts.push(this.value);
  }
  });
  return opts;
  }
