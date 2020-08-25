<?php namespace ProcessWire;

if(!defined("PROCESSWIRE")) die();

/** @var Config $config */
/** @var AdminThemeUikit $adminTheme */
/** @var AdminThemeUikitMarkup $markup */
/** @var User $user */
/** @var array $extras */

/**
 * Check if we need to fload the footer to the bottom.
 */
$contains = array("/admin/graphql/");

if (in_array($page->path, $contains)) {
	$floatClass = " footerFloatBottom";
} else {
	$floatClass = "";
}

$darkMode = $user->darkMode ? "-dark" : "";

?>

<style>
	div#TracyEnableButton {
		bottom: 28px !important;
		right: 40px !important;
		color: #fff !important;
	}
</style>
<!-- FOOTER -->
<footer id='pw-footer' class='uk-margin<?=$floatClass?>'>
	<div class='pw-container uk-container uk-container-expand'>
		<div uk-grid>
			<div class='uk-width-1-3@m uk-flex-last@m uk-text-right@m uk-text-center'>
				<div id='pw-uk-debug-toggle' class='uk-text-small debugBy'></div>
			</div>	
			<div class='uk-width-2-3@m uk-flex-first@m uk-text-center uk-text-left@m'>

				<div class='uk-margin-remove byIcons'>
					<ul class="byLine">

						<li>
							<a href="/admin/info" class="pw-panel byIconPadding"><img src="/site/templates/images/logo-admin-by<?=$darkMode?>.svg" alt="meta" uk-tooltip="title: <b>Version:</b> meta-<?=$config->edition?></br><b>Service:</b> <?=$config->service?>; pos: top-left;"></img></a>
							<?php if($adminTheme->isLoggedIn): ?>
							<small class='uk-text-small uk-text-muted byMargin'>
								<?php 
								echo "v{$config->versionMeta}";
								?>
							</small>	
							<?php endif; ?>
						</li>

						<li class="byPadding">
							<a href="/admin/setup/migrations/" class="pw-panel byIconPadding"><img src="/site/templates/images/icon-schema-by.svg" alt="schema" uk-tooltip="title: <b>Schema Versions</b><br><b>Master:</b> ecs-v1.5.0<br><b>Extended:</b> v0.0.1; pos: top-left"></img></a>
							<?php if($adminTheme->isLoggedIn): ?>
							<small class='uk-text-small uk-text-muted byMargin'>
								<?php 
								echo "v{$config->versionSchema}";
								?>
							</small>	
							<?php endif; ?>

						</li>

						<?php if($adminTheme->isSuperuser && $config->debug):?>
						<li class="byPadding">
							<a href="https://processwire.com" target="_blank" class="byIconPadding"><img src="/site/templates/images/logo-pw-by.svg" alt="ProcessWire" uk-tooltip="title: <b>CMF:</b> ProcessWire</br><b>PHP:</b> <?=phpversion();?></br><b>UIkit:</b> 3.5.4</br><b>FA:</b> 4.7.0</br><b>FAS:</b> 5.13.1; pos: top-left"></img></a>
							<?php if($adminTheme->isLoggedIn): ?>
							<small class='uk-text-small uk-text-muted byMargin'>
								<?php 
								echo "v" . $config->versionName . ' <!--v' . $config->systemVersion . '--> ';
								?>
							</small>	
							<?php endif; ?>
						</li>
						<?php endif; ?>

						<?php if($adminTheme->isSuperuser && $config->debug):?>
						<li class="byPadding">
							fdsa<i class="fa fa-question"></i>
							<?php if($adminTheme->isLoggedIn): ?>
							<small class='uk-text-small uk-text-muted byMargin'>
								<?php 
								echo "Getting Started";
								?>
							</small>	
							<?php endif; ?>
						</li>
						<?php endif; ?>

						<li>
							<?php 
							if($adminTheme->isEditor && $config->advanced):?>
								<small class='uk-text-small uk-text-muted byMargin'>
									<?php 
									echo $adminTheme->renderNavIcon('flask advancedBy') . $this->_('Advanced Mode');
									?>
								</small>
							<?php endif; ?>
						</li>
						
					</ul>
				</div>
			</div>	
		</div>	
		<?php if($adminTheme->isSuperuser && $config->debug):
			include($config->paths->wire . 'templates-admin/debug.inc'); ?>
			<script>
				$('#debug_toggle').appendTo('#pw-uk-debug-toggle');
				$('#debug').find('table').addClass('uk-table uk-table-small uk-table-hover uk-table-divider');
			</script>
		<?php endif; ?>
	</div>
	<?php echo $adminTheme->renderExtraMarkup('footer'); ?>
</footer>
