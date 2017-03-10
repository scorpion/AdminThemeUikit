<?php namespace ProcessWire;

if(!defined("PROCESSWIRE")) die();

/** @var AdminThemeUikit $adminTheme */
/** @var AdminThemeUikitMarkup $markup */
/** @var User $user */
/** @var array $extras */
/** @var Paths $urls */
/** @var Config $config */

?>
<header id='pw-masthead-mobile' class='uk-hidden@m uk-background-muted'>
	<div class='uk-container uk-container-expand'>
		<div class='uk-padding-small uk-text-center'>
			<a href='#' onclick='$("#offcanvas-toggle").click(); return false;'>
				<img class='pw-logo' src='<?php echo $adminTheme->getLogoURL(); ?>' alt='ProcessWire' />
			</a>
		</div>	
	</div>	
</header>
<header id='pw-masthead' class='uk-background-muted uk-visible@m'>
	<div class='uk-container uk-container-expand'>
		<nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
			<div class="uk-navbar-left">
				<a class="uk-logo uk-margin-right" href='#' onclick='$("#offcanvas-toggle").click(); return false;'>
					<img class='pw-logo' src='<?php echo $adminTheme->getLogoURL(); ?>' alt='ProcessWire'>
				</a>
				<?php if($adminTheme->isLoggedIn): ?>
				<ul class='uk-navbar-nav'>
					<?php echo $adminTheme->renderPrimaryNavItems(); ?>
				</ul>	
				<?php endif; ?>
			</div>
			<?php if($adminTheme->isLoggedIn): ?>
			<div class="uk-navbar-right uk-visible@m">
				<ul class='uk-navbar-nav uk-margin-right'>
					<li>
						<a id="tools-toggle" class="pw-dropdown-toggle" href="<?php echo $urls->admin; ?>profile/">
							<?php echo $adminTheme->renderNavIcon('user') . $user->name; ?>
						</a>
						<ul class="pw-dropdown-menu" data-my="left top" data-at="left bottom" style="display: none;">
							<?php if($config->debug): ?>
								<li>	
								<a href='#' onclick="$('#debug_toggle').click(); return false;">
									<?php echo $adminTheme->renderNavIcon('bug') . __('Debug'); ?>
								</a>
							</li>
							<?php endif; ?>
							<?php echo $adminTheme->renderUserNavItems(); ?>
						</ul>
					</li>
				</ul>	
			
				<?php include(__DIR__ . '/_search-form.php'); ?>
				
			</div>
			<?php endif; // loggedin ?>
		</nav>
	</div>
	<?php echo $adminTheme->renderExtraMarkup('masthead'); ?>
</header>

