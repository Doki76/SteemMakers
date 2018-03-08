<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include("./src/globalhead.php"); ?>

		<!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
	</head>
	<body class="bg-secondary" >
		<?php include("navbar.php"); ?>

		<div class="container" style="width: 75%;">
			<h3 class="my-4">SteemMakers - Delegation</h3>
			
			<h4 class="my-4">Support us and yourself by delegating Steem Power</h4>
			
			<p>Help us grow and reward the maker community on the Steem Blockchain.</p>
			<p>The SteemMakers bot is curating good maker related content and needs your help to improve his power. We are a bunch of minnows and small fish. We should stick together and grow into a vast fish swarm. A powerful bot will help each of the fishes in the maker swarm.</p>
			<p>The steem blockchain provides for this purpose the possibility to delegate steem power.</p>
			
			<h4 class="my-4">Delegation is a Win-Win concept for everyone!</h4>
			
			<p>Outside of the Steem Blockchain when you want to support a good cause, you have to spend your money, and then it’s gone. You need to trust the receiver that he uses it for what he promised but if he doesn’t, you have no way to get it back.</p>
			<p>Steem Blockchain does change this. A delegation of Steem Power to @SteemMakers means you help the good cause as the SteemMakers bot will use the Power to curate Maker and DIY related content. And you will benefit from being able to read more of this type of posts or get higher votes for yourself if you write DIY posts.</p>
			<p>But you don’t lose the control. At any time you can cancel the delegation. It will take only seven days for the steem power to be available for you again. That gives all delegators the freedom to change their mind, and it will motivate the receiver of the delegation not to misuse the power that you provided.</p>

			<h4 class="my-4">How to Delegate to @SteemMakers?</h4>
			<p>Just fill out this form, and it will forward you to SteemConnect to execute a delegation! You will need your Active-key.</p>

			<form action="https://v2.steemconnect.com/sign/delegateVestingShares" id="person">
				<div class="form-group">
					<label class="control-label">Username</label>
					<div class="input-group">
						<div class="input-group-addon">
							<span class="input-group-text">@</span>
						</div>
						<input type="text" class="form-control" placeholder="Your steem ID" name="delegator" type="text">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">Steem Power to delegate</label>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Enter the amount here" name="sp" type="text">
					</div>
				</div>
				<input name="delegatee" type="hidden" value="steemmakers">
				<input name="vesting_shares" type="hidden" value="0">

				<button type="submit" class="btn btn-primary">Submit</button>
			</form>

			<h4 class="my-4">Who delegated to SteemMakers already?</h4>
			<table id="result" width="200px">
				<tr><td>Delegator</td><td>&nbsp;&nbsp;&nbsp;</td><td>SP</td></tr>
			</table>
		</div>
		<?php include("footer.php"); ?>
		<script>
			$(function ()
			{
				/* https://helloacm.com/api/steemit/converter/?cached */
				function initDelegation()
				{
					$( "input[name='sp']" ).change(function()
					{
						$( "input[name='vesting_shares']" ).val( $( "input[name='sp']" ).val() + ' SP' );
					});

					$.getJSON( "https://uploadbeta.com/api/steemit/delegators/?cached&id=steemmakers", function( data )
					{
						var items = [];
						$.each( data, function( key, value )
						{
							items.push( "<tr><td><a href='https://steemit.com/@" +value['delegator'] +"/'>@" + value['delegator'] + "</a></td><td></td><td>" + Math.round(value['sp']) +  "</td></tr>" );
						});
	
						$('#result tr:last').after(items.join( "" ));
					});
				}

				initDelegation();
			});
		</script>
	</body>
</html>
