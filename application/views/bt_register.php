<div>  
  <div class="span4"></div>
  <div class="span4">
    <?php echo validation_errors(); ?>
    <form class="form-horizontal" action="/index.php/page/register" method="post">
      <div class="control-group">
        <label class="control-label" for="inputEmail">email</label>
        <div class="controls">
          <input type="text" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="email">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="nickname">nickname</label>
        <div class="controls">
          <input type="text" id="nickname" name="nickname" value="<?php echo set_value('nickname'); ?>" placeholder="nickname">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="password">password</label>
        <div class="controls">
          <input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="password">
        </div>
      </div>      
      <div class="control-group">
        <label class="control-label" for="re_password">re_password</label>
        <div class="controls">
          <input type="password" id="re_password" name="re_password" value="<?php echo set_value('re_password'); ?>" placeholder="re_password">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"></label>
        <div class="controls">
          <input type="submit" class="btn btn-primary" value="Sign Up" />
        </div>
      </div>      
    </form>  
  </div>
  <div class="span4"></div>  
</div>