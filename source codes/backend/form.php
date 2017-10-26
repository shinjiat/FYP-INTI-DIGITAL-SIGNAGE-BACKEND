
<!DOCTYPE html>
<html>
<body>
<!-- hardcoded values for easy testing -->
<!-- block = A, level = 1, name = A-L1 -->
<form action="insertMap.php" method="post" enctype="multipart/form-data">
  <fieldset>
    <label for="block">Block</label>
    <input type="text" name="block" id="block" value ="" class="text ui-widget-content ui-corner-all" required="">
    <label for="level">Level</label>
    <input type="text" name="level" id="level" value = "" class="text ui-widget-content ui-corner-all" required="">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value = "" class="text ui-widget-content ui-corner-all" required="">
    <label for="name"></label>
    <input name="file" type="file" required="">
    <br>
    <input name="submit" type="submit" class="ui-button ui-corner-all ui-widget" value="Upload File" >
    </fieldset>
</form>

<script>

</script>


</body>
</html>
