<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2011, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */
?>
<!doctype html>
<html>
<head>
	<?php echo $this->html->charset();?>
	<title>Application &gt; <?php echo $this->title(); ?></title>
	<?php echo $this->html->script(array('jquery-1.7', 'popup', 'toggle')); ?>
	<?php echo $this->html->style(array('noteslide','testlogin', 'fonts')); ?>
	<?php echo $this->html->link('Icon', null, array('type' => 'icon')); ?>
</head>
<body class="app">
 <div id="overlay"></div>
	<div id="container">
        <div class="topmenu">
            <span id="ns">
                <?php echo $this->html->image('ns.png'); ?>
            </span>
            <span id="addpost"><?php if($currentUser):?>
            <a href="#" id="noteboxlink">Create Note</a>

            	<?php endif ?>
			</span>
           <!--<span id="search"><form method="POST" name="searchform" id="topsearchform"><input name="search" id="topsearchbox" /></form></span>-->
            <div id="loginarea">
                <?php if($currentUser): ?>
                <?php echo $currentUser['name'] ?>
                (<?php echo $this->html->link('Logout', array(
                    'controller' => 'users',
                    'action' => 'logout'
                )) ?>)

                <a href="#" id="noteboxlink">Create Note</a>
                <a href="#" id="editprofilelink">Edit Profile</a>
                <?php else: ?>
                <a href="#" id="loginlink">Login or Register<?php echo $this->html->image("drop.png"); ?></a>
                <?php endif ?>
            </div>
        </div>
        <div class="subcontainer">
		<div class="content">
		<div class="sidebar">
			<div class="toptear"><?php echo $this->html->image("pin.png", array("class"=>"pin")); ?></div>
			<div class="sidebarcontent">
				<ul id="postselector">
					<li id="listall">List All</li>
					<li id="bygroup"><a href="#" onClick="toggleGroups()">By Group</a></li>
					<ul id="groups">
						<li id="g1">Group 1</li>
						<li id="g2">Group 2</li>
						<li id="g3">Group 3</li>
					</ul>
					<li id="bylocation"><a href="#"  onclick="toggleLocations()">By Location</a></li>
					<ul id="locations">
						<li id="l1">Location 1</li>
						<li id="l2">Location 2</li>
						<li id="l3">Location 3</li>
					</ul>

				</ul>
			</div>
			<div class="bottomtear"></div>
		</div>
		<div class="notes">
	            <?php echo $this->flashMessage->output() ?>
				<?php echo $this->content(); ?>
		</div>
	</div>

<div id="editprofile">
 <a id="editprofileClose" style="float: right">x</a>
<div id="loginheader">Edit your Profile</div>
<div id="editprofilespace">
<form>
<label>Username: </label>
<input type="text" style="width: 100%" class="form1" name="username"/><br />
Email:
<input type="text" style="width: 100%" class="form1" name="username"/><br />
University:
<input type="text" style="width: 100%" class="form1" name="university"/><br />
Password:
<input type="password" style="width: 100%" class="form1" name="university"/><br />
Confirm Password:
<input type="password" style="width: 100%" class="form1" name="university"/><br />
 <input type="submit" style="float: right"class="submitbutton" value="Submit"  />
</form>
</div></div>
    <div id="notebox">
        <a id="noteboxClose">x</a>
        <div id="loginheader">Create Post </div>
        <div id="noteboxspace">
            <form>
                <label>Title: </label>
                <input type="text" style="width: 100%" class="form1" name="title"/><br />
                Category: <select name="category" style="height: 30px">
                <option value="Computer Science">Computer Science</option>
                <option value="Chemistry">Chemistry </option>
                </select> <br/>
                Content: <br/>
                <textarea rows="11" class="textarea"  name="content">Enter note here...</textarea>

                <input type="submit" style="float: right"class="submitbutton" value="Submit"  />
            </form>
        </div>
    </div>
    <?php if(!$currentUser): ?>
    <div id="loginbox">
        <a id="loginboxClose">x</a>
        <div id="loginheader">Login</div>
        <div id="loginspace">
            <?php echo $this->form->create(null, array(
                'url' => array(
                    'controller' => 'users',
                    'action' => 'login'
                )
            )) ?>
            <?php echo $this->form->field('email') ?>
            <?php echo $this->form->field('password', array(
                'type' => 'password'
            )) ?>
            <?php echo $this->form->submit('Login') ?>
            or <?php echo $this->html->link('Sign up!', array(
                'controller' => 'users',
                'action' => 'signup'
            )) ?>
            <?php echo $this->form->end() ?>
        </div>
    </div>

    <?php endif ?>
</body>
</html>