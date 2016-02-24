<div class="modal">
  <div class="modal-header">
    <h3>Login</h3>
  </div>
  <form class="form-horizontal" action="/index.php/page/authentication" method="post">
      <div class="modal-body">
          <div class="control-group">
            <label class="control-label" for="inputEmail">ID</label>
            <div class="controls">
              <input type="text" id="id" name="id" placeholder="id">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputPassword">Password</label>
            <div class="controls">
              <input type="password" id="password" name="password" placeholder="Password">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="login"/>
      </div>
  </form>
</div>