<ul id="ul_li_SubCategories" style="width:200px;" class="chargeCapturetable margin0">
    <li sequence="1" title="Category 1" class="liEllipsis" value="9">
        <button class="upbutton">Up</button><button class="downbutton">Down</button>
        <a href="#"><span class="viewIcons delFaceName _delete fl"></span>Category 1</a>
    </li>
    <li sequence="2" title="Category 3" class="liEllipsis" value="11">
        <button class="upbutton">Up</button><button class="downbutton">Down</button>
        <a href="#"><span class="viewIcons delFaceName _delete fl"></span>Category 3</a>
    </li>
    <li sequence="4" title="Category 4" class="liEllipsis" value="12">
        <button class="upbutton">Up</button><button class="downbutton">Down</button>
        <a href="#"><span class="viewIcons delFaceName _delete fl"></span>Category 4</a>
    </li>
    <li sequence="5" title="Category 6" class="liEllipsis" value="22">
        <button class="upbutton">Up</button><button class="downbutton">Down</button>
        <a href="#"><span class="viewIcons delFaceName _delete fl"></span>Category 6</a>
    </li>
    <li sequence="6" title="Category 5" class="liEllipsis" value="13">
        <button class="upbutton">Up</button><button class="downbutton">Down</button>
        <a href="#"><span class="viewIcons delFaceName _delete fl"></span>Category 5</a>
    </li>
    <li sequence="7" title="Category 7" class="liEllipsis" value="55">
        <button class="upbutton">Up</button><button class="downbutton">Down</button>
        <a href="#"><span class="viewIcons delFaceName _delete fl"></span>Category 7</a>
    </li>
    <li sequence="99999" title="Category 8" class="liEllipsis" value="62">
        <button class="upbutton">Up</button><button class="downbutton">Down</button>
        <a href="#"><span class="viewIcons delFaceName _delete fl"></span>Category 8</a>
    </li>
</ul>
<script>
$('.upbutton').on('click', function() {
  var hook = $(this).closest('.liEllipsis').prev('.liEllipsis');
  if (hook.length) {
    var elementToMove = $(this).closest('.liEllipsis').detach();
    hook.before(elementToMove);
  }
});
$('.downbutton').on('click', function() {
  var hook = $(this).closest('.liEllipsis').next('.liEllipsis');
  if (hook.length) {
    var elementToMove = $(this).closest('.liEllipsis').detach();
    hook.after(elementToMove);
  }
});
</script>
<style>
.liEllipsis:first-child .upbutton {
    display: none;
}
.liEllipsis:last-child .downbutton {
    display: none;
}
</style>