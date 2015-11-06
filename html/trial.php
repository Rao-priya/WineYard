<script>
    function IsValue_Post(){
       var  vrname = document.vrmainfrm.vrname.value;
       window.location = "./search.php?cmpname=" + vrname;
      }
</script>


        <form id="vrmainfrm" name="vrmainfrm" method="POST" >
         <input name="vrname" type="text" id="vrname" value=""/><a href="javascript:IsValue_Post();">See Details</a>
           ......
           ......
        
        </form>