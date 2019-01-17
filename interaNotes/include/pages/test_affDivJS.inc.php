<style type="text/css">

</style>

<!-- HIDDEN DYNAMIC ELEMENT TO CLONE -->
<!-- you can replace it with any other elements -->
<div class="form-group dynamic-element" style="display:none">
  <div class="row">
    <div class="col-md-10"></div>
    
    <!-- Replace these fields -->
    <div class="col-md-4">
      <input type="text" name="" class="form-control">
    </div>
    <div class="col-md-4">
      <input type="number" step="0.25" min="0" max="20" name="" class="form-control">
    </div>
    <!-- End of fields-->
    <div class="col-md-1">
      <p class="delete">X</p>
    </div>
  </div>
</div>
<!-- END OF HIDDEN ELEMENT -->





<div class="form-container">
  <form class="form-horizontal">
    <fieldset>
      <!-- Form Name -->
      <legend class="title">test</legend>

      <div class="dynamic-stuff">
        <!-- Dynamic element will be cloned here -->
        <!-- You can call clone function once if you want it to show it a first element-->
      </div>

      <!-- Button -->
      <div class="form-group">
        <div class="row">
          <div class="col-md-12">
            <p class="add-one">+ ajouter Question</p>
          </div>
          <div class="col-md-5"></div>
        </div>
      </div>
    </fieldset>
  </form>
</div>