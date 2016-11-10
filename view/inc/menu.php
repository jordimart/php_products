

<div id="navbar" class="navbar-collapse collapse">

              <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                <li class= <?php if($_GET['module'] == "main"){
                        echo "active";}else{ echo "";} ?> >
                        <a href="index.php?module=main">Home</a>
                      </li>
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Products Frontend<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class= <?php if($_GET['module'] == "products"){
                           echo "active";}else{ echo "";} ?> >
                           <a href="index.php?module=products&view=create_products">Create Products</a>
                    </li>
                    <li class= <?php if($_GET['module'] == "page_products"){
                           echo "active";}else{ echo "";} ?> >
                           <a href="index.php?module=page_products&view=page_products">List Products</a>
                    </li>
                  </ul>
                </li>
                <li class= <?php if($_GET['module'] == "contact"){
                        echo "active";}else{ echo "";} ?> >
                        <a href="index.php?module=contact">Contact</a>
                      </li>
                <li class= <?php if($_GET['module'] == "login"){
                        echo "active";}else{ echo "";} ?> >
                        <a href="index.php?module=login">Login</a>
                      </li>
                <li class= <?php if($_GET['module'] == "about"){
                        echo "active";}else{ echo "";} ?> >
                        <a href="index.php?module=about">About</a>
                      </li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
      </div>
      <!-- END MENU -->
    </header>
